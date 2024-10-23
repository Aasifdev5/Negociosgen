<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Task;
use App\Models\User;
use App\Models\Client;
use App\Models\Project;
use App\Models\TaskUser;
use App\Models\Template;
use App\Models\Workspace;
use Illuminate\Http\Request;
use App\Services\DeletionService;
use GuzzleHttp\Promise\TaskQueue;
use App\Notifications\VerifyEmail;
use Spatie\Permission\Models\Role;
use App\Models\UserClientPreference;
use Illuminate\Support\Facades\Auth;
use App\Notifications\AccountCreation;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Contracts\Role as ContractsRole;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $workspace = Workspace::find(session()->get('workspace_id'));
        $users = $workspace->users;
        $roles = Role::where('guard_name', 'web')->get();
        return view('users.users', ['users' => $users, 'roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('guard_name', 'web')->get();
        return view('users.create_user', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        ini_set('max_execution_time', 300);
        $formFields = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
            'address' => 'nullable',
            'phone' => 'nullable',
            'country_code' => 'nullable',
            'city' => 'nullable',
            'state' => 'nullable',
            'country' => 'nullable',
            'zip' => 'nullable',
            'dob' => 'nullable',
            'doj' => 'nullable',
            'role' => 'required'
        ]);

        $workspace = Workspace::find(session()->get('workspace_id'));

        // $dob = $request->input('dob');
        // $doj = $request->input('doj');
        // $formFields['dob'] = format_date($dob, false, app('php_date_format'), 'Y-m-d');
        // $formFields['doj'] = format_date($doj, false, app('php_date_format'), 'Y-m-d');

        $password = $request->input('password');
        $formFields['password'] = bcrypt($password);
        if ($request->hasFile('photo')) {
            $formFields['photo'] = $request->file('photo')->store('photos', 'public');
        } else {
            $formFields['photo'] = 'photos/no-image.jpg';
        }

        $require_ev = isAdminOrHasAllDataAccess() && $request->has('require_ev') && $request->input('require_ev') == 0 ? 0 : 1;
        $status = isAdminOrHasAllDataAccess() && $request->has('status') && $request->input('status') == 1 ? 1 : 0;
        if ($require_ev == 0) {
            $formFields['email_verified_at'] = now()->tz(config('app.timezone'));
        }
        $formFields['status'] = $status;
        $user = User::create($formFields);
        $user->assignRole($request->input('role'));
        try {
            if ($require_ev == 1) {
                $user->notify(new VerifyEmail($user));
            }

            $workspace->users()->attach($user->id);

            if (isEmailConfigured()) {
                $account_creation_template = Template::where('type', 'email')
                    ->where('name', 'account_creation')
                    ->first();
                if (!$account_creation_template || ($account_creation_template->status !== 0)) {
                    $user->notify(new AccountCreation($user, $password));
                }
            }
            Session::flash('message', 'User created successfully.');
            return response()->json(['error' => false, 'id' => $user->id]);
        } catch (TransportExceptionInterface $e) {

            $user = User::findOrFail($user->id);
            $user->delete();
            return response()->json(['error' => true, 'message' => 'User couldn\'t be created, please make sure email settings are oprational.']);
        } catch (Throwable $e) {
            // dd($e->getMessage());
            // Catch any other throwable, including non-Exception errors

            $user = User::findOrFail($user->id);
            $user->delete();
            return response()->json(['error' => true, 'message' => 'User couldn\'t be created, please make sure email settings are oprational.']);
        }
    }

    public function email_verification()
    {
        $user = getAuthenticatedUser();
        if (!$user->hasVerifiedEmail()) {
            return view('auth.verification-notice');
        } else {
            return redirect('/home');
        }
    }

    public function resend_verification_link(Request $request)
    {
        if (isEmailConfigured()) {
            try {
                $request->user()->notify(new VerifyEmail($request->user()));
                Session::flash('message', 'Verification link sent successfully.');
            } catch (TransportExceptionInterface $e) {
                Session::flash('error', 'Verification link couldn\'t be sent, please check email settings.');
            } catch (Throwable $e) {
                Session::flash('error', 'Verification link couldn\'t be sent, please check email settings.');
            }
        } else {
            Session::flash('error', 'Verification link couldn\'t be sent, please check email settings.');
        }
        return back();
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit_user($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::where('guard_name', 'web')->get();
        return view('users.edit_user', ['user' => $user, 'roles' => $roles]);
    }

    public function update_user(Request $request, $id)
    {
        $formFields = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'phone' => 'nullable',
            'country_code' => 'nullable',
            'address' => 'nullable',
            'city' => 'nullable',
            'state' => 'nullable',
            'country' => 'nullable',
            'zip' => 'nullable',
            'dob' => 'nullable',
            'doj' => 'nullable',
            'password' => 'nullable|min:6',
            'password_confirmation' => 'required_with:password|same:password'
        ]);
        $user = User::findOrFail($id);
        // $dob = $request->input('dob');
        // $doj = $request->input('doj');
        // $formFields['dob'] = format_date($dob, false, app('php_date_format'), 'Y-m-d');
        // $formFields['doj'] = format_date($doj, false, app('php_date_format'), 'Y-m-d');
        if ($request->hasFile('upload')) {
            if ($user->photo != 'photos/no-image.jpg' && $user->photo !== null)
                Storage::disk('public')->delete($user->photo);

            $formFields['photo'] = $request->file('upload')->store('photos', 'public');
        }

        $status = isAdminOrHasAllDataAccess() && $request->has('status') ? $request->input('status') : $user->status;
        $formFields['status'] = $status;

        if (isAdminOrHasAllDataAccess() && isset($formFields['password']) && !empty($formFields['password'])) {
            $formFields['password'] = bcrypt($formFields['password']);
        } else {
            unset($formFields['password']);
        }

        $user->update($formFields);
        $user->syncRoles($request->input('role'));

        Session::flash('message', 'Profile details updated successfully.');
        return response()->json(['error' => false, 'id' => $user->id]);
    }

    public function update_photo(Request $request, $id)
    {
        if ($request->hasFile('upload')) {
            $old = User::findOrFail($id);
            if ($old->photo != 'photos/no-image.jpg' && $old->photo !== null)
                Storage::disk('public')->delete($old->photo);
            $formFields['photo'] = $request->file('upload')->store('photos', 'public');
            User::findOrFail($id)->update($formFields);
            return back()->with('message', 'Profile picture updated successfully.');
        } else {
            return back()->with('error', 'No profile picture selected.');
        }
    }

    public function delete_user($id)
    {
        $user = User::findOrFail($id);
        $response = DeletionService::delete(User::class, $id, 'User');
        UserClientPreference::where('user_id', 'u_' . $id)->delete();
        $user->todos()->delete();
        return $response;
    }

    public function delete_multiple_user(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'ids' => 'required|array', // Ensure 'ids' is present and an array
            'ids.*' => 'integer|exists:users,id' // Ensure each ID in 'ids' is an integer and exists in the table
        ]);

        $ids = $validatedData['ids'];
        $deletedUsers = [];
        $deletedUserNames = [];
        // Perform deletion using validated IDs
        foreach ($ids as $id) {
            $user = User::findOrFail($id);
            if ($user) {
                $deletedUsers[] = $id;
                $deletedUserNames[] = $user->first_name . ' ' . $user->last_name;
                DeletionService::delete(User::class, $id, 'User');
                UserClientPreference::where('user_id', 'u_' . $id)->delete();
                $user->todos()->delete();
            }
        }
        return response()->json(['error' => false, 'message' => 'User(s) deleted successfully.', 'id' => $deletedUsers, 'titles' => $deletedUserNames]);
    }

    public function logout(Request $request)
    {
        if (Auth::guard('web')->check()) {
            auth('web')->logout();
        } else {
            auth('client')->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Logged out successfully.');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        $userExists = User::where('email', $request->email)->exists();
        $clientExists = Client::where('email', $request->email)->exists();
        $logged_in = false;

        if ($userExists) {
            $user = User::where('email', $formFields['email'])->first();
            if ($user->hasRole('admin') || $user->status == 1) {
                if (auth('web')->attempt($formFields)) {
                    $user = auth('web')->user();
                    $logged_in = true;
                }
            } else {
                return response()->json(['error' => true, 'message' => get_label('status_not_active', 'Your account is currently inactive. Please contact the admin for assistance.')]);
            }
        } elseif ($clientExists) {
            $user = Client::where('email', $formFields['email'])->first();
            if ($user->internal_purpose == 0) {
                if ($user->status == 1) {
                    if (auth('client')->attempt($formFields)) {
                        $user = auth('client')->user();
                        $logged_in = true;
                    }
                } else {
                    return response()->json(['error' => true, 'message' => get_label('status_not_active', 'Your account is currently inactive. Please contact the admin for assistance.')]);
                }
            } else {
                return response()->json(['error' => true, 'message' => get_label('account_internal_purpose', 'Your account is recognized for internal purposes, Please contact the admin for assistance.')]);
            }
        } else {
            return response()->json(['error' => true, 'message' => 'Account not found!']);
        }

        if ($logged_in) {
            $workspace_id = isset($user->workspaces[0]['id']) && !empty($user->workspaces[0]['id']) ? $user->workspaces[0]['id'] : 0;
            $my_locale = $locale = isset($user->lang) && !empty($user->lang) ? $user->lang : 'en';
            $data = ['user_id' => $user->id, 'workspace_id' => $workspace_id, 'my_locale' => $my_locale, 'locale' => $locale];
            session()->put($data);
            $request->session()->regenerate();

            Session::flash('message', 'Logged in successfully.');
            return response()->json(['error' => false]);
        } else {
            return response()->json(['error' => true, 'message' => 'Invalid credentials!']);
        }
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $workspace = Workspace::find(session()->get('workspace_id'));
        $projects = isAdminOrHasAllDataAccess('user', $id) ? $workspace->projects : $user->projects;
        $tasks = isAdminOrHasAllDataAccess() ? $workspace->tasks->count() : $user->tasks->count();
        $users = $workspace->users;
        $clients = $workspace->clients;

        return view('users.user_profile', ['user' => $user, 'projects' => $projects, 'tasks' => $tasks, 'users' => $users, 'clients' => $clients, 'auth_user' => getAuthenticatedUser()]);
    }

    public function list()
    {
        $workspace = Workspace::find(session()->get('workspace_id'));
        $search = request('search');
        $sort = request('sort') ?: 'id';
        $order = request('order') ?: 'DESC';
        $type = request('type');
        $typeId = request('typeId');
        $status = isset($_REQUEST['status']) && $_REQUEST['status'] !== '' ? $_REQUEST['status'] : "";
        $role_ids = request('role_ids', []);

        if ($type && $typeId) {
            if ($type == 'project') {
                $project = Project::find($typeId);
                $users = $project->users();
            } elseif ($type == 'task') {
                $task = Task::find($typeId);
                $users = $task->users();
            } else {
                $users = $workspace->users();
            }
        } else {
            $users = $workspace->users();
        }

        // Ensure the search query does not introduce duplicates
        $users = $users->when($search, function ($query) use ($search) {
            return $query->where(function ($query) use ($search) {
                $query->where('first_name', 'like', '%' . $search . '%')
                    ->orWhere('last_name', 'like', '%' . $search . '%')
                    ->orWhere('phone', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            });
        });

        if ($status != '') {
            $users = $users->where('status', $status);
        }

        if (!empty($role_ids)) {
            $users = $users->whereHas('roles', function ($query) use ($role_ids) {
                $query->whereIn('roles.id', $role_ids);
            });
        }

        $totalusers = $users->count();

        $canEdit = checkPermission('edit_users');
        $canDelete = checkPermission('delete_users');
        $canManageProjects = checkPermission('manage_projects');
        $canManageTasks = checkPermission('manage_tasks');

        // Use distinct to avoid duplicates if any join condition or query causes duplicates
        $users = $users->select('users.*')
            ->distinct()
            ->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->leftJoin('roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->orderByRaw("CASE WHEN roles.name = 'admin' THEN 0 ELSE 1 END")
            ->orderByRaw("CASE WHEN roles.name = 'admin' THEN users.id END ASC")
            ->orderBy($sort, $order)
            ->paginate(request("limit"))
            ->through(
                function ($user) use ($workspace, $canEdit, $canDelete, $canManageProjects, $canManageTasks) {
                    $actions = '';
                    if ($canEdit) {
                        $actions .= '<a href="/users/edit/' . $user->id . '" title="' . get_label('update', 'Update') . '">' .
                            '<i class="bx bx-edit mx-1"></i>' .
                            '</a>';
                    }

                    if ($canDelete) {
                        $actions .= '<button title="' . get_label('delete', 'Delete') . '" type="button" class="btn delete" data-id="' . $user->id . '" data-type="users">' .
                            '<i class="bx bx-trash text-danger mx-1"></i>' .
                            '</button>';
                    }

                    $actions = $actions ?: '-';

                    $projectsBadge = '<span class="badge rounded-pill bg-primary">' . (isAdminOrHasAllDataAccess('user', $user->id) ? count($workspace->projects) : count($user->projects)) . '</span>';
                    if ($canManageProjects) {
                        $projectsBadge = '<a href="javascript:void(0);" class="viewAssigned" data-type="projects" data-id="' . 'user_' . $user->id . '" data-user="' . $user->first_name . ' ' . $user->last_name . '">' .
                            $projectsBadge . '</a>';
                    }

                    $tasksBadge = '<span class="badge rounded-pill bg-primary">' . (isAdminOrHasAllDataAccess('user', $user->id) ? count($workspace->tasks) : count($user->tasks)) . '</span>';
                    if ($canManageTasks) {
                        $tasksBadge = '<a href="javascript:void(0);" class="viewAssigned" data-type="tasks" data-id="' . 'user_' . $user->id . '" data-user="' . $user->first_name . ' ' . $user->last_name . '">' .
                            $tasksBadge . '</a>';
                    }

                    $photoHtml = "<div class='avatar avatar-md pull-up' title='" . $user->first_name . " " . $user->last_name . "'>
                    <a href='/users/profile/" . $user->id . "'>
                        <img src='" . ($user->photo ? asset('storage/' . $user->photo) : asset('storage/photos/no-image.jpg')) . "' alt='Avatar' class='rounded-circle'>
                    </a>
                  </div>";

                    $statusBadge = $user->status === 1
                        ? '<span class="badge bg-success">' . get_label('active', 'Active') . '</span>'
                        : '<span class="badge bg-danger">' . get_label('deactive', 'Deactive') . '</span>';

                    $formattedHtml = '<div class="d-flex mt-2">' .
                        $photoHtml .
                        '<div class="mx-2">' .
                        '<h6 class="mb-1">' .
                        $user->first_name . ' ' . $user->last_name .
                        ' ' . $statusBadge .
                        '</h6>' .
                        '<p class="text-muted">' . $user->email . '</p>' .
                        '</div>' .
                        '</div>';

                    $phone = !empty($user->country_code) ? $user->country_code . ' ' . $user->phone : $user->phone;

                    return [
                        'id' => $user->id,
                        'first_name' => $user->first_name,
                        'last_name' => $user->last_name,
                        'role' => "<span class='badge bg-label-" . (isset(config('taskhub.role_labels')[$user->getRoleNames()->first()]) ? config('taskhub.role_labels')[$user->getRoleNames()->first()] : config('taskhub.role_labels')['default']) . " me-1'>" . $user->getRoleNames()->first() . "</span>",
                        'email' => $user->email,
                        'phone' => $phone,
                        'profile' => $formattedHtml,
                        'status' => $user->status,
                        'created_at' => format_date($user->created_at, true),
                        'updated_at' => format_date($user->updated_at, true),
                        'assigned' => '<div class="d-flex justify-content-start align-items-center">' .
                            '<div class="text-center mx-4">' .
                            $projectsBadge .
                            '<div>' . get_label('projects', 'Projects') . '</div>' .
                            '</div>' .
                            '<div class="text-center">' .
                            $tasksBadge .
                            '<div>' . get_label('tasks', 'Tasks') . '</div>' .
                            '</div>' .
                            '</div>',
                        'actions' => $actions
                    ];
                }
            );

        return response()->json([
            "rows" => $users->items(),
            "total" => $totalusers,
        ]);
    }
}
