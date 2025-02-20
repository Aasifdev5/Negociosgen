<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckMembershipStatus
{
    /**
     * Manejar la solicitud entrante.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Session::has('LoggedIn')) {
            return redirect()->route('Userlogin')->with('error', __('Por favor, inicie sesión primero.'));
        }

        $user_session = \App\Models\User::find(Session::get('LoggedIn'));
        if (!$user_session) {
            return redirect()->route('Userlogin')->with('error', __('Usuario no encontrado.'));
        }

        if (in_array($user_session->membership_status, ['expired', 'pending'])) {
            return redirect()->back()->with('fail', __('Su membresía está expirada o pendiente. Por favor, actualice su membresía.'));
        }

        // Depuración: Registrar o volcar datos para asegurarse de que está funcionando
        \Log::info('Middleware pasado para el usuario: ' . $user_session->id);

        return $next($request);
    }
}
