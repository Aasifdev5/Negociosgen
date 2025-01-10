<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Membership;
use App\Models\User; // Include the User model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MembershipController extends Controller
{
    public function __construct()
    {
        // Apply session check to all methods in this controller
        $this->middleware(function ($request, $next) {
            if (!Session::has('LoggedIn')) {
                return redirect()->route('login')->with('error', 'Por favor, inicie sesión primero.');
            }
            return $next($request);
        });
    }

    public function index()
    {
        // Ensure the session is valid
        $user_session = $this->getUserSession();

        if (!$user_session) {
            return redirect()->route('login')->with('error', 'Sesión no válida. Por favor, inicie sesión de nuevo.');
        }

        $memberships = Membership::all();
        return view('admin.memberships.index', compact('memberships', 'user_session'));
    }

    public function create()
    {
        // Ensure the session is valid
        $user_session = $this->getUserSession();

        if (!$user_session) {
            return redirect()->route('login')->with('error', 'Sesión no válida. Por favor, inicie sesión de nuevo.');
        }

        return view('admin.memberships.create', compact('user_session'));
    }

    public function store(Request $request)
    {
        // Ensure the session is valid
        $user_session = $this->getUserSession();

        if (!$user_session) {
            return redirect()->route('login')->with('error', 'Sesión no válida. Por favor, inicie sesión de nuevo.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|string',
            'benefits' => 'required|array',
            'duration' => 'required|string',
            'highlight_color' => 'nullable|string',
        ]);

        Membership::create([
            'name' => $request->name,
            'price' => $request->price,
            'benefits' => $request->benefits,
            'duration' => $request->duration,
            'highlight_color' => $request->highlight_color,
        ]);

        return redirect()->route('memberships.index')->with('success', 'Membership created successfully!');
    }

    public function edit(Membership $membership)
    {
        // Ensure the session is valid
        $user_session = $this->getUserSession();

        if (!$user_session) {
            return redirect()->route('login')->with('error', 'Sesión no válida. Por favor, inicie sesión de nuevo.');
        }

        return view('admin.memberships.edit', compact('membership', 'user_session'));
    }

    public function update(Request $request, Membership $membership)
    {
        // Ensure the session is valid
        $user_session = $this->getUserSession();

        if (!$user_session) {
            return redirect()->route('login')->with('error', 'Sesión no válida. Por favor, inicie sesión de nuevo.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|string',
            'benefits' => 'required|array',
            'duration' => 'required|string',
            'highlight_color' => 'nullable|string',
        ]);

        $membership->update($request->all());

        return redirect()->route('memberships.index')->with('success', 'Membership updated successfully!');
    }

    public function destroy(Membership $membership)
    {
        // Ensure the session is valid
        $user_session = $this->getUserSession();

        if (!$user_session) {
            return redirect()->route('login')->with('error', 'Sesión no válida. Por favor, inicie sesión de nuevo.');
        }

        $membership->delete();

        return redirect()->route('memberships.index')->with('success', 'Membership deleted successfully!');
    }

    // Helper method to retrieve the user session
    private function getUserSession()
    {
        return User::find(Session::get('LoggedIn'));
    }
}
