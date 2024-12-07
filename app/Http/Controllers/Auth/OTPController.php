<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class OTPController extends Controller
{
    public function sendOtp(Request $request)
    {
        // Validate email exists in the users table
        $request->validate(['email' => 'required|email|exists:users,email']);

        // Generate OTP
        $otp = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT); // Pads the number with zeros if necessary


        // Store OTP in the session
        Session::put('otp', $otp);
        Session::put('email', $request->email);
        // Send OTP via email
        Mail::to($request->email)->send(new \App\Mail\SendOtpMail($otp));

        return redirect()->route('verify.otp')->with('success', 'OTP sent to your email.');
    }
    public function resendOtp(Request $request)
    {
        // Retrieve the email from the session
        $email = Session::get('email');

        // Validate email exists in the users table
        if (!$email || !User::where('email', $email)->exists()) {
            return back()->with('fail', 'No se puede reenviar el código. Por favor intenta de nuevo.'); // Or handle error appropriately
        }

        // Generate OTP
        $otp = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT); // Pads the number with zeros if necessary

        // Store the new OTP in the session
        Session::put('otp', $otp);

        // Send the new OTP via email
        Mail::to($email)->send(new \App\Mail\SendOtpMail($otp));

        return redirect()->route('verify.otp')->with('success', 'Nuevo código enviado a tu correo electrónico.');
    }
    public function showOtpForm()
    {
        return view('verification'); // Show OTP verification form
    }

    public function verifyOtp(Request $request)
    {
        // Validate OTP input
        $request->validate([
            'otp_digit1' => 'required|min:0|max:9',
            'otp_digit2' => 'required|min:0|max:9',
            'otp_digit3' => 'required|min:0|max:9',
            'otp_digit4' => 'required|min:0|max:9',
            'otp_digit5' => 'required|min:0|max:9',
            'otp_digit6' => 'required|min:0|max:9',
        ]);

        // Combine OTP digits into a single string
        $otp = $request->otp_digit1 . $request->otp_digit2 . $request->otp_digit3 . $request->otp_digit4 . $request->otp_digit5 . $request->otp_digit6;

        // Retrieve the OTP from the session
        $sessionOtp = Session::get('otp');

        // Log the session OTP and submitted OTP for debugging
        \Log::info('Session OTP: ' . $sessionOtp);
        \Log::info('Submitted OTP: ' . $otp);

        // Verify the OTP
        if ($sessionOtp && $otp === $sessionOtp) {
            // Limpiar el OTP de la sesión
            Session::forget('otp');

            // Recuperar el usuario basado en el correo electrónico de la sesión
            $user = User::where('email', Session::get('email'))->first();
            if ($user->is_subscribed == 0 && $user->is_active == 0) {
                  // Actualizar detalles del usuario después de una verificación exitosa
            $user->update([
                'is_online' => 1,
                'last_seen' => Carbon::now('UTC')
            ]);

            // Establecer la sesión para el usuario conectado
            $request->session()->put('LoggedIn', $user->id);
                return redirect('addpaymentmethod')->with([

                    'user' => $user
                ]);
            }
            // Verificar si el usuario está suscrito
            if ($user->is_subscribed !== 1) {
                return back()->with('fail', 'Tu cuenta no está suscrita. Por favor, suscríbete para continuar.');
            }

            // Actualizar detalles del usuario después de una verificación exitosa
            $user->update([
                'is_online' => 1,
                'last_seen' => Carbon::now('UTC')
            ]);

            // Establecer la sesión para el usuario conectado
            $request->session()->put('LoggedIn', $user->id);

            // Redirigir a la página de bienvenida
            return redirect('welcome')->with('success', 'OTP verificado con éxito.');
        } else {
            // OTP inválido
            return back()->with('fail', 'OTP inválido. Por favor, inténtalo de nuevo.');
        }
    }
}
