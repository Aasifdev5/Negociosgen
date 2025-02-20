<?php

namespace App\Http\Controllers;


use App\Mail\MembershipRenewalNotification;
use App\Mail\SendMailreset;
use App\Models\Balance;
use App\Models\Category;
use App\Models\City;

use App\Models\Country;
use App\Models\MembershipPayment;

use App\Models\Notification;
use App\Models\PasswordReset;

use App\Models\Payment;
use App\Models\Membership;
use App\Models\Permissions;

use App\Models\Sales;
use App\Models\User;
use App\Models\Withdrawal;
use App\Notifications\VerifyEmailNotification;
use App\Traits\SendNotification;

use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;



class Admin extends Controller
{
    use SendNotification;
    public function admin()
    {
        return view('admin.admin');
    }

    public function Delete_course(Request $request)
    {
        $category = Campaign::find($request->id);
        $category->delete();

        return back()->with('success', 'Deleted Succesuufully');
    }
    public function Pcreate()
    {
        if (Session::has('LoggedIn')) {
            $permissions = Permissions::all();
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $title = 'Permission Create';
            return view('admin.permissions.create', compact('user_session', 'permissions', 'title'));
        }
    }
    public function earn()
    {
        if (Session::has('LoggedIn')) {

            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            return view('admin.earn', compact('user_session'));
        }
    }
    public function Plist()
    {
        if (Session::has('LoggedIn')) {
            $permissions = Permissions::all();
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $title = 'Permission List';
            return view('admin.permissions.index', compact('user_session', 'permissions', 'title'));
        }
    }
    public function Pstore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:permissions,id'
        ]);

        Permissions::create([
            'name' => $request->name,
            'parent_id' => $request->parent_id
        ]);

        return redirect()->route('permissions.index')->with('success', 'Permission created successfully.');
    }
    public function Pedit(Request $request, $id)
    {
        if (Session::has('LoggedIn')) {
            $permission = Permissions::findOrFail($id);
            $permissions = Permissions::all();
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $title = 'Permission Edit';
            return view('admin.permissions.edit', compact('user_session', 'permission', 'permissions', 'title'));
        }
    }
    public function Pupdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:permissions,id',
        ]);

        $permission = Permissions::findOrFail($id);
        $permission->name = $request->name;
        $permission->parent_id = $request->parent_id;
        $permission->save();

        return redirect()->route('permissions.index')->with('success', 'Permission updated successfully');
    }
    public function pdestroy($id)
    {
        try {
            $permission = Permissions::findOrFail($id);
            $permission->delete();
            return response()->json(['success' => 'Permission Eliminado con éxito.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete permission.'], 500);
        }
    }


    public function registration(Request $request)
    {
        $user = new User();
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users',
            'pass' => 'required'
        ]);
        $user->name = $request->first_name;
        $user->lastname = $request->last_name;
        $user->email = $request->email;
        $user->password = FacadesHash::make($request->pass);
        $data = $user->save();
        if ($data) {
            return back()->with('success', 'Registered');
        } else {
            return back()->with('fail', 'failed');
        }
    }


    public function notificationUrl($uuid)
    {
        $notification = Notification::whereUuid($uuid)->first();
        $notification->is_seen = 'yes';
        $notification->save();

        if (is_null($notification->target_url)) {
            return redirect(url()->previous());
        } else {
            return redirect($notification->target_url);
        }
    }

    public function markAllAsReadNotification(Request $request)
    {
        $userId = $request->input('user_id');
        $data = User::find($userId);



        Notification::where('user_id', $userId)->where('is_seen', 'no')->update(['is_seen' => 'yes']);


        return back();
    }
    public function login(Request $request)
    {
        $user = new user();
        $request->validate([
            'email' => 'required',
            'pass' => 'required'

        ]);

        $data = user::where('email', $request->email)->first();
        // print_r($data->password);

        // die;
        if ($data) {
            if (FacadesHash::check($request->pass, $data->password)) {

                $session = $request->session()->all();
                $data->update(['is_online' => 1, 'last_seen' => Carbon::now()]);
                session()->put('LoggedIn', $data->id);

                return redirect('admin/dashboard');
            } else {
                return back()->with('fail', 'Password does not match');
            }
        } else {
            return back()->with('fail', 'Email is not register');
        }
    }

    public function dashboard(Request $request)
    {
        if (Session::has('LoggedIn')) {

            $usersData = DB::table("users")->where('is_super_admin', '0')->orderBy('created_at', 'desc')->get();
            $total_users = User::where('is_super_admin', 0)
                ->whereNot('account_type', 'admin')
                ->get();

            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $labels2 = [];
            $data2 = [];

            // Get the start and end of the current week
            $startDate = Carbon::now()->startOfWeek();
            $endDate = Carbon::now()->endOfWeek();

            // Generate labels and fetch data for each day of the current week
            for ($date = $startDate; $date <= $endDate; $date->addDay()) {
                // Append day to labels array
                $labels2[] = $date->format('D, M j');

                // Fetch payments for the current day with 'accepted' = 1
                $totalSale = DB::table('payments')

                    ->whereDate('created_at', $date->format('Y-m-d'))
                    ->sum('amount');

                // Append total sale to data array
                $data2[] = $totalSale;
            }

            $chartData2 = [
                'labels2' => $labels2, // Labels in order from start to end of week
                'data2' => $data2, // Data matches the order of labels
            ];


            return view('admin.dashboard', compact('user_session', 'total_users', 'usersData', 'chartData2'));
        }
    }
    public function getPaymentData(Request $request)
    {
        $type = $request->input('type', 'week'); // Default to week if not provided
        $data = [];

        switch ($type) {
            case 'week':
                $data = $this->calculateWeeklyData();
                break;
            case 'month':
                $data = $this->calculateMonthlyData();
                break;
            case 'year':
                $data = $this->calculateYearlyData();
                break;
            default:
                return response()->json(['error' => 'Invalid type provided'], 400);
        }

        return response()->json($data);
    }

    protected function calculateWeeklyData()
    {
        Carbon::setLocale('es'); // Set locale to Spanish

        $startDate = Carbon::now()->startOfWeek();
        $endDate = Carbon::now()->endOfWeek();

        $labels2 = [];
        $data2 = [];

        for ($date = $startDate; $date <= $endDate; $date->addDay()) {
            $labels2[] = $date->isoFormat('ddd, D MMM'); // Format as 'Day, Date Month' in Spanish
            $totalSale = DB::table('payments')

                ->whereDate('created_at', $date->format('Y-m-d'))
                ->sum('amount');
            $data2[] = $totalSale;
        }

        return ['labels2' => $labels2, 'data2' => $data2];
    }

    protected function calculateMonthlyData()
    {
        Carbon::setLocale('es'); // Set locale to Spanish

        $labels2 = [];
        $data2 = [];

        $currentMonth = date('m');
        $currentYear = date('Y');
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $currentMonth, $currentYear);

        for ($day = 1; $day <= $daysInMonth; $day++) {
            $date = sprintf('%04d-%02d-%02d', $currentYear, $currentMonth, $day);
            $labels2[] = Carbon::parse($date)->isoFormat('D MMM'); // Format as 'Date Month' in Spanish
            $totalSale = DB::table('payments')

                ->whereDate('created_at', $date)
                ->sum('amount');
            $data2[] = $totalSale;
        }

        return ['labels2' => $labels2, 'data2' => $data2];
    }

    protected function calculateYearlyData()
    {
        Carbon::setLocale('es'); // Set locale to Spanish

        $labels2 = [];
        $data2 = [];

        $currentYear = date('Y');

        for ($month = 1; $month <= 12; $month++) {
            $monthStart = sprintf('%04d-%02d-01', $currentYear, $month);
            $monthEnd = date('Y-m-t', strtotime($monthStart));
            $labels2[] = Carbon::parse($monthStart)->isoFormat('MMMM'); // Format as 'Month' in Spanish
            $totalSale = DB::table('payments')

                ->whereBetween('created_at', [$monthStart, $monthEnd])
                ->sum('amount');
            $data2[] = $totalSale;
        }

        return ['labels2' => $labels2, 'data2' => $data2];
    }


    public function users(Request $request)
    {
        if (Session::has('LoggedIn')) {
            $usersData = DB::table("users")->where('is_super_admin', '0')->orderBy('created_at', 'desc')->get();
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            return view('admin/users', compact('user_session', 'usersData'));
        }
    }
    public function shopkeepers(Request $request)
    {
        if (Session::has('LoggedIn')) {
            $usersData = DB::table("users")->where('is_super_admin', '0')->get();
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            return view('admin/shopkeepers', compact('user_session', 'usersData'));
        }
    }
    public function country(Request $request)
    {
        if (Session::has('LoggedIn')) {
            $countries = Country::all();
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            return view('admin.country', compact('user_session', 'countries'));
        }
    }
    public function city(Request $request)
    {
        if (Session::has('LoggedIn')) {
            $countries = City::all();
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            return view('admin.city', compact('user_session', 'countries'));
        }
    }
    public function edit_user(Request $request, $id)
    {
        if (Session::has('LoggedIn')) {
            $userData = DB::table("users")->where('id', $id)->where('is_super_admin', '0')->first();
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $countries = Country::all();
            $cities = City::all();
            return view('admin/edit_user', compact('user_session', 'userData', 'countries', 'cities'));
        }
    }
    public function edit_shopkeeper(Request $request, $id)
    {
        if (Session::has('LoggedIn')) {
            $userData = DB::table("users")->where('id', $id)->where('is_super_admin', '0')->first();
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            return view('admin/edit_shopkeeper', compact('user_session', 'userData'));
        }
    }
    public function change_password(Request $request)
    {

        $data = array();
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', '=', Session::get('LoggedIn'))->first();
        }

        return view('admin.change_password', compact('user_session'));
    }

    public function update_password(Request $request)
    {


        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => ['same:new_password']
        ]);


        $data = User::find(Session::get('LoggedIn'));
        // $data = User::where('id', '=', Session::get('LoggedIn'))->first();
        if (!FacadesHash::check($request->old_password, $data->password)) {
            return back()->with("fail", "Old Password Doesn't match!");
        }
        if (FacadesHash::check($request->new_password, $data->password)) {
            return back()->with("fail", "Please enter a password which is not similar then current password!!");
        }
        #Update the new Password
        $data = User::where('id', '=', $data->id)->update([
            'password' => FacadesHash::make($request->new_password)

        ]);
        return redirect('admin/dashboard')->with('success', 'Successfully Updated');
    }



    public function profile(Request $request)
    {
        $data = array();
        if (Session::has('LoggedIn')) {
            $data = User::where('id', '=', Session::get('LoggedIn'))->first();
        }

        return view('admin.profile', compact('data'));
    }

    public function logout(Request $request)
    {
        if (Session::has('LoggedIn')) {

            $check = User::where('id', Session::get('LoggedIn'))->first();
            if ($check->is_super_admin == 0) {
                Session::forget('LoggedIn');
                $request->session()->invalidate();
                return redirect('/');
            }
            Session::forget('LoggedIn');
            $request->session()->invalidate();
            return redirect('admin/login');
        }
    }
    public function add_user()
    {
        if (Session::has('LoggedIn')) {

            $countries = Country::all();
            $cities = City::all();
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            return view('admin.add_user', compact('user_session', 'countries', 'cities'));
        }
    }
    public function add_shopkeeper()
    {
        if (Session::has('LoggedIn')) {


            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            return view('admin.add_shopkeeper', compact('user_session'));
        }
    }
    public function save_user(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => ['required', 'string', 'min:8', 'max:30'],
            'confirm_password' => 'required|same:password', // Ensure password confirmation matches
            'mobile_number' => 'required|string|max:15', // Adjusted to match the expected format
            'id_number' => 'required|string|max:20', // Validation for ID number
            'address' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'country' => 'required|exists:countries,id', // Ensure country exists in the database
            'city' => 'required|exists:cities,id', // Ensure city exists in the database
            'status' => 'required|boolean', // Ensure status is provided
        ]);

        try {
            // Mobile number handling
            $mobileNumber = $request->mobile_number; // Updated to match your form field
            $prefixedMobileNumber = "591" . $mobileNumber;

            // Create a new user instance
            $user = User::create([
                'account_type' => 'affiliate',
                'name' => trim($request->first_name . ' ' . $request->last_name), // Combine first and last name
                'email' => $request->email,
                'password' => bcrypt($request->password), // Ensure the password is hashed
                'custom_password' => $request->password,
                'mobile_number' => $prefixedMobileNumber,
                'id_number' => $request->id_number, // New field from the form
                'country' => $request->country, // Assuming you have country in User model
                'address' => $request->address, // Assuming you have address in User model
                'city' => $request->city, // Assuming you have city in User model
                'birth_date' => $request->birth_date, // Assuming you have birth_date in User model
                'status' => $request->status, // Active status
            ]);

            // Send email verification notification
            $user->notify(new VerifyEmailNotification($user));

            // Fire the UserRegistered event (if needed)
            // event(new UserRegistered($user));

            // Notification for registration
            $text = 'A new user has registered on the platform.';
            $target_url = route('users');
            $this->sendForApi($text, 1, $target_url, $user->id, $user->id);

            return back()->with('success', 'User is created');
        } catch (\Exception $e) {
            // Log the error for debugging purposes (optional)
            \Log::error('Error creating user: ' . $e->getMessage());
            return back()->with('fail', 'Error: ' . $e->getMessage());
        }
    }

    public function save_shopkeeper(Request $request)
    {

        $user = new User();
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',

        ]);
        if (!empty($request->profile_photo)) {

            $image = $request->file('profile_photo')->getClientOriginalName();
            $final =  $request->profile_photo->move(public_path('profile_photo'), $image);
            $profile = $_FILES['profile_photo']['name'];
        } else {
            $profile = '';
        }

        // dd($request->all());

        // Create a new user instance
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => $request->password,
            'custom_password' =>  $request->password,
            'account_type' =>  'shopkeeper',

            'profile_photo' => $profile,
            'status' => $request->status,
            'ip_address' => request()->ip(),
        ]);

        // Send email verification notification
        $user->notify(new VerifyEmailNotification($user));

        if ($user) {
            return redirect('admin\shopkeepers')->with('success', 'El comerciante se agregó correctamente');
        } else {
            return back()->with('fail', 'failed');
        }
    }
   public function delete_user($id)
{
    $user = User::find($id);

    if ($user) {
        $user->delete();
        return response()->json(['success' => true, 'message' => 'Usuario eliminado con éxito.']);
    } else {
        return response()->json(['success' => false, 'message' => 'Usuario no encontrado.']);
    }
}
    public function delete_shopkeeper($id)
    {

        $user = User::where('id', '=', $id)->first();

        if ($user) {
            $user->delete();
            return back()->with('success', 'Eliminado con éxito');
        } else {
            return back()->with('error', 'User not found');
        }
    }


    public function edit_profile()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            return view('admin.edit_profile', compact('user_session'));
        }
    }
    public function update_profile(Request $request)
    {
        $request->validate([
            'profile_photo' => 'required',

        ]);

        if (!empty($request->profile_photo)) {

            $image = $request->file('profile_photo')->getClientOriginalName();
            $final =  $request->profile_photo->move(public_path('profile_photo'), $image);
            $profile = $_FILES['profile_photo']['name'];
        }
        $check = User::find($request->user_id);

        if (empty($request->profile_photo)) {

            $profile = $check->profile_photo;
        }
        $data = User::find(Session::get('LoggedIn'));
        $data = User::where('id', '=', $request->user_id)->update([
            'name' => ($request->name),

            'email' => ($request->email),
            'profile_photo' => $profile,

        ]);
        if ($data) {
            return redirect('admin/dashboard')->with('success', 'Profile Updted Successfully');
        } else {
            return back()->with('fail', 'Failed');
        }
    }

    public function update_user(Request $request)
    {
        try {
            $request->validate([
                'user_id' => 'required|exists:users,id',
                'first_name' => 'required|string|max:255',
                'mobile_number' => 'required|string|max:15',
                'email' => 'required|email|max:255',
                'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'id_number' => 'nullable|string|max:20',
                'country' => 'nullable|exists:countries,id',
                'city' => 'nullable|exists:cities,id',
                'status' => 'required|boolean',
            ]);

            $user = User::findOrFail($request->user_id);

            $user->name = trim($request->first_name);
            $user->mobile_number = "591" . $request->mobile_number;
            $user->email = $request->email;
            $user->status = $request->status;

            if ($request->hasFile('profile_photo')) {
                $profilePhoto = $request->file('profile_photo');
                $imageName = time() . '_' . $profilePhoto->getClientOriginalName();
                $profilePhoto->move(public_path('profile_photo'), $imageName);

                if ($user->profile_photo && file_exists(public_path('profile_photo/' . $user->profile_photo))) {
                    unlink(public_path('profile_photo/' . $user->profile_photo));
                }
                $user->profile_photo = $imageName;
            }

            if ($user->save()) {
                return redirect('admin/users')->with('success', 'Usuario actualizado con éxito');
            } else {
                return redirect()->back()->with('fail', 'Error al actualizar el perfil');
            }
        } catch (\Exception $e) {
            \Log::error('Error updating user: ' . $e->getMessage());
            return redirect()->back()->with('fail', 'Error: ' . $e->getMessage());
        }
    }





    public function update_shopkeeper(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        // Perform validation, including potentially unique email for existing users other than the current one
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $user->id, // Exclude current user from email uniqueness check
            // 'password' => 'nullable|confirmed', // Only validate password if provided

        ]);

        // Update user information only if fields are filled (prevents unnecessary updates)
        if ($request->has('name')) {
            $user->name = $request->name;
        }
        if ($request->has('email')) {
            $user->email = $request->email;
        }


        if (!empty($request->profile_photo)) {

            $image = $request->file('profile_photo')->getClientOriginalName();
            $final =  $request->profile_photo->move(public_path('profile_photo'), $image);
            $profile = $_FILES['profile_photo']['name'];
        }
        $check = User::find($request->user_id);

        if (empty($request->profile_photo)) {

            $profile = $check->profile_photo;
        }
        $data = User::find(Session::get('LoggedIn'));
        $data = User::where('id', '=', $request->user_id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,

            'custom_password' =>  $request->password,
            'account_type' =>  'shopkeeper',
            'status' => $request->status,
            'ip_address' => request()->ip(),
            'profile_photo' => $profile,


        ]);
        if ($data) {
            return redirect('admin/shopkeepers')->with('success', 'Actualizado con éxito');
        } else {
            return back()->with('fail', 'Failed');
        }
    }
    public function forget_password()
    {

        return view('admin.forget_password');
    }
    public function forget_mail(Request $request)
    {
        try {
            $customer = User::where('email', $request->email)->get();

            if (count($customer) > 0) {

                $token = Str::random(40);
                $domain = URL::to('/');
                $url = $domain . '/ResetPasswordLoad?token=' . $token;

                $data['url'] = $url;
                $data['email'] = $request->email;
                $data['title'] = "Password Reset";
                $data['body'] = "Please click on below link to reset your password.";
                $data['auth'] = "Endless";

                Mail::to($request->email)->send(
                    new SendMailreset(
                        $token,
                        $request->email,
                        $data
                    )
                );


                $datetime = Carbon::now()->format('Y-m-d H:i:s');

                PasswordReset::updateOrCreate(
                    ['email' => $request->email],
                    [
                        'email' => $request->email,
                        'token' => $token,
                        'created_at' => $datetime
                    ]
                );
                return redirect('admin/forget_password')->with('success', 'Please check your mail to reset your password');
                // return response()->json(['success' => true, 'msg' => 'Please check your mail to reset your password.']);
            } else {
                return redirect('admin/forget_password')->with('fail', 'User not found');
                // return response()->json(['fail' => false, 'msg' => 'User not found']);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }
    public function ResetPasswordLoad(Request $request)
    {

        $resetData =  PasswordReset::where('token', $request->token)->get();
        if (isset($request->token) && count($resetData) > 0) {
            $customer = User::where('email', $resetData[0]['email'])->get();

            return view('admin.ResetPasswordLoad', ['customer' => $customer]);
        }
    }



    public function ResetPassword(Request $request)
    {

        $request->validate([

            'new_password' => 'required',
            'confirm_password' => ['same:new_password']
        ]);

        $data = User::find($request->user_id);
        if (FacadesHash::check($request->new_password, $data->password)) {
            return back()->with("fail", "Please enter a password which is not similar then current password!!");
        }
        $data->password = FacadesHash::make($request->new_password);
        $data->update();

        PasswordReset::where('email', $data->email)->delete();

        echo "<h1>Successfully Reset Password</h1>";
        return redirect('index');
    }


    public function Course_list() //dispaly course list
    {
        if (Session::has('LoggedIn')) {
            $courses = Campaign::all();
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            return view('admin.Course_list', compact('user_session', 'courses'));
        }
    }
    public function save_course(Request $request)
    {

        $request->validate([
            'category_id' => 'required',
            'category_icon' => 'required',
            'product_photo' => 'required',

            'description' => 'required',

        ]);
        $course = new Campaign();

        if (!empty($request->product_photo)) {

            $image = $request->file('product_photo')->getClientOriginalName();
            $request->product_photo->move(public_path('product_photo'), $image);
        }


        $course->category_id = $request->category_id;
        $course->category_icon = $request->category_icon;
        $course->course_photo = $_FILES['product_photo']['name'];

        $course->description = $request->description;

        $data = $course->save();
        if ($data) {
            return redirect('admin/Course_list')->with('success', 'Category Added Successfully');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    public function edit_courses(Request $request)
    {

        if (Session::has('LoggedIn')) {

            $project_detail = Campaign::where('id', $request->id)->first();
            $category = Category::all();
            $countries = Country::all();
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
        }
        return view('admin.edit_courses', compact('countries', 'user_session', 'project_detail', 'category'));
    }

    public function update_course(Request $request)
    {


        // dd($request->all());
        $slug = unique_slug($request->title);

        // Retrieve the existing campaign by its ID
        $campaign = Campaign::findOrFail($request->id);
        $user_id = $campaign->user_id;
        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            // Delete the previous image file if it exists
            if ($campaign->image) {
                // Construct the path to the previous image file
                $previousImagePath = public_path($campaign->image);

                // Check if the file exists before attempting to delete it
                if (file_exists($previousImagePath)) {
                    unlink($previousImagePath); // Delete the previous image file
                }
            }

            // Handle the new image upload
            $image = $request->file('image');
            $destination = 'Projects';
            $file_name = time() . '-' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/' . $destination), $file_name);
            $campaign->image = 'uploads/' . $destination . '/' . $file_name;
        }

        // Update other fields with the new values from the request
        $campaign->user_id = $user_id;
        $campaign->category_id = $request->category;
        $campaign->title = $request->title;
        $campaign->slug = $slug;
        $campaign->description = $request->description;
        $campaign->campaign_owner_commission = get_option('campaign_owner_commission');
        $campaign->goal = $request->goal;
        $campaign->min_amount = $request->min_amount;
        $campaign->max_amount = $request->max_amount;
        $campaign->short_description = $request->short_description;
        $campaign->amount_prefilled = $request->amount_prefilled;
        $campaign->end_method = $request->end_method;
        $campaign->video = $request->video;
        $campaign->status = $request->status; // Assuming status is set to 0 for update
        $campaign->country_id = $request->country_id;
        $campaign->address = $request->address;
        $campaign->is_funded = 0; // Assuming is_funded is set to 0 for update
        $campaign->start_date = $request->start_date;
        $campaign->end_date = $request->end_date;

        // Check if status is approved
        if ($request->status == "1") {
            $text = 'Project has been approved.';
        }
        // Check if status is rejected
        elseif ($request->status == "-1") {
            $text = 'Project has been rejected.';
        }
        // If status is neither approved nor rejected, handle accordingly
        else {
            $text = 'Project status is unknown.';
        }

        // Assuming you're constructing a URL for the project details using $slug
        $target_url = url('project-details', ['slug' => $slug]);

        // Assuming you're sending some API request with parameters
        // Adjust this part according to your API sending mechanism
        $this->sendForApi($text, 2, $target_url, 1, 1);

        // Handle OG image updates (similar logic as image update)
        // Note: If og_image is also expected to be updated in this form, you should check if og_image file exists before deleting the previous one.
        if ($request->hasFile('og_image')) {
            // Delete the previous OG image file if it exists
            if ($campaign->og_image) {
                $previousOgImagePath = public_path($campaign->og_image);
                if (file_exists($previousOgImagePath)) {
                    unlink($previousOgImagePath); // Delete the previous OG image file
                }
            }

            // Handle the new OG image upload
            $og_image = $request->file('og_image');
            $destination = 'meta';
            $file_name = time() . '-' . Str::random(10) . '.' . $og_image->getClientOriginalExtension();
            $og_image->move(public_path('uploads/' . $destination), $file_name);
            $campaign->og_image = 'uploads/' . $destination . '/' . $file_name;
        }

        // Save the updated campaign
        if ($campaign->save()) {
            // If the update is successful, return success message
            return back()->with('success', 'Campaign updated successfully');
        }


        // If the update fails, return error message
        return back()->with('fail', 'Failed to update campaign');
    }



    public function transactions_report(Request $request)
    {

        if (Session::has('LoggedIn')) {

            // Fetch all transactions ordered by ID in descending order
            $transaction = Payment::orderBy('id', 'desc')->get();
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            return view('admin.pages.transactions_list', compact('user_session', 'transaction'));
        }
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids');

        if ($ids) {
            User::whereIn('id', $ids)->delete();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }

    public function accept($id)
    {
        DB::beginTransaction(); // Start transaction
        try {
            // Fetch the payment and mark it as accepted
            $payment = Payment::findOrFail($id);
            $payment->accepted = true;
            $payment->save();

            // Fetch the user associated with the payment
            $user = User::findOrFail($payment->user_id);

            // If the user isn't subscribed and is not active, and payment is exactly 100.00, activate subscription
            if ($user->is_subscribed == 0 && $user->is_active == 0 && $payment->amount == 100.00) {
                // Update the user's subscription status to active
                $user->update([
                    'is_subscribed' => 1,
                    'is_active' => 1
                ]);
            } else {
                if ($user->membershipType != null) {
                    $membership = Membership::where('name', $user->membershipType)->first();

                    if ($membership) {
                        $durationInYears = $membership->duration;
                        // Membership cost and percentage distribution across levels
                        $membershipCost = $membership->price; // Adjust as needed
                        $membership_id = $membership->id;

                        if ($user->membership_status == "expired" || $user->membership_status == "pending" || $user->payment_status == "unpaid" || $user->payment_status == "pending") {
                            // Otherwise, just mark them as subscribed (if not already)
                            $user->update([
                                'is_subscribed' => 1,
                                'membershipType' => $user->membershipType,
                                'membership_status' => 'active',
                                'membership_start_date' => now(),
                                'membership_end_date' => now()->addYears($durationInYears),
                                'renewal_due_date' => now()->addYears($durationInYears)->subDays(30), // Reminder one month before expiry
                                'payment_status' => 'paid',
                            ]);
                            MembershipPayment::create([
                                'user_id' => $user->id,
                                'membership_id' => $membership_id,
                                'amount_paid' => $membershipCost,
                                'payment_date' => now(),
                                'payment_method' => 'paypal',
                            ]);
                        }
                    }
                }


                $levelPercentages = [
                    1 => 0.30, // Level 1: 30%
                    2 => 0.03, // Level 2: 3%
                    3 => 0.02, // Level 3: 2%
                    4 => 0.02, // Level 4: 2%
                    5 => 0.01, // Level 5: 1%
                    6 => 0.01, // Level 6: 1%
                    7 => 0.01, // Level 7: 1%
                ];

                // Only run the referral logic if the payment is not 100.00
                if ($payment->amount != 100.00) {
                    // Start with the immediate referrer
                    $currentReferrer = $user->refer;
                    // Find the user by reference
                   $mainrefer = User::where('id', $user->refer)->first();

if ($mainrefer) {
    // Update the refer_date field
    $mainrefer->update([
        'refer_date' => Carbon::now(),
    ]);
}
                    $level = 1;

                    // Distribute commissions up to 7 levels and update user levels
                    while ($currentReferrer && $level <= 7) {
                        $referrer = User::find($currentReferrer);

                        if ($referrer) {
                            // Calculate the earnings for the current level
                            $earnings = $membershipCost * $levelPercentages[$level];

                            // Efficiently update the referrer's balance using increment
                            $referrer->increment('balance', $earnings);

                            // Update or create an entry in the Balance table
                            Balance::updateOrCreate(
                                ['user_id' => $referrer->id], // Condition for existing entry
                                ['amount' => $referrer->balance] // Values to update or insert
                            );

                            // Update the referrer's level to reflect the commission tier
                            $referrer->level = $level;
                            $referrer->save();

                            // Add an entry to the Sales table
                            Sales::create([
                                'user_id' => $user->id, // User who made the purchase
                                'refer_id' => $referrer->id, // Referrer's ID
                                'level' => $level, // Commission level
                                'percentage' => $levelPercentages[$level], // Commission percentage
                                'commission' => $earnings, // Commission earned
                                'date' => now(), // Current date
                            ]);

                            // Move to the next referrer
                            $currentReferrer = $referrer->refer;
                        } else {
                            break; // Stop if no valid referrer exists
                        }

                        $level++;
                    }
                }
            }

            // Commit the transaction
            DB::commit();

            return back()->with('success', 'Pago aceptado, el usuario está suscrito y las ganancias se distribuyeron correctamente a los referenciados.');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback transaction on error

            // Log the error with more detailed information
            \Log::error('Error al aceptar el pago para Payment ID ' . $id . ': ' . $e->getMessage(), [
                'exception' => $e
            ]);

            return back()->with('fail', 'Ocurrió un error al procesar el pago.');
        }
    }
    public function withdraws()
    {

        if (Session::has('LoggedIn')) {

            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            $requestWithdrawal = Withdrawal::all();


            return view('admin.withdraw', compact('user_session', 'requestWithdrawal'));
        }
    }
    public function updateStatus(Request $request, $id)
    {
        $withdrawal = Withdrawal::findOrFail($id);
        $withdrawal->status = $request->status;

        if ($request->status === 'approved') {
            // Update the balance in the `users` table
            $user = User::find($withdrawal->user_id);

            if (!$user || $user->balance < $withdrawal->amount) {
                return back()->with('fail', 'Insufficient balance in the user account.');
            }

            $user->balance -= $withdrawal->amount;
            $user->save();

            // Update the balance in the `balance` table
            $balance = Balance::where('user_id', $withdrawal->user_id)->first();

            if (!$balance || $balance->amount < $withdrawal->amount) {
                return back()->with('fail', 'Insufficient balance in the balance table.');
            }

            $balance->amount -= $withdrawal->amount;
            $balance->save();
        }

        $withdrawal->save();

        return back()->with('success', 'Withdrawal status updated.');
    }
}
