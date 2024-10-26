<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\User;
use App\Models\TimeLog;


class InactivityTimeout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
       
        $lastActivity = Session::get('last_activity');
        $timeout = config('session.lifetime') * 60; // Convert minutes to seconds

        if ($lastActivity && (time() - $lastActivity) > $timeout) {
            $userId = Session::get('LoggedIn'); // Retrieve user_id from request
            $data = User::find($userId);
            if ($data) {
                $data->update(['is_online' => 0, 'last_seen' => Carbon::now()]);
                
                // Log the logout time
                $lastTimeLog = TimeLog::where('user_id', $data->id)->latest()->first();
                if ($lastTimeLog) {
                    $lastTimeLog->end_time = Carbon::now();
                    $lastTimeLog->save();
                }
            }

            Session::forget('LoggedIn');
            return response()->json(['status' => 'expired']);
        }

        // Update last activity timestamp
        Session::put('last_activity', time());

        return $next($request);
    }
}
