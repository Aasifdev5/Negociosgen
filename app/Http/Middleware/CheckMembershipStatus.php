<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckMembershipStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
{
    if (!Session::has('LoggedIn')) {
        return redirect()->route('Userlogin')->with('error', __('Please log in first.'));
    }

    $user_session = \App\Models\User::find(Session::get('LoggedIn'));
    if (!$user_session) {
        return redirect()->route('Userlogin')->with('error', __('User not found.'));
    }

    if (in_array($user_session->membership_status, ['expired', 'pending'])) {
        return redirect()->back()->with('fail', __('Your membership is expired or pending. Please update your membership.'));
    }

    // Debugging: Log or dump data to ensure it's working
    \Log::info('Middleware passed for user: ' . $user_session->id);

    return $next($request);
}

}
