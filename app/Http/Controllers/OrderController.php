<?php

namespace App\Http\Controllers;

use App\Mail\OrderPlaced;

use App\Mail\PaymentReceived;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'membershipType' => 'nullable|string',
            'amount' => 'required|numeric|min:1',
            'cardPayment' => 'nullable',
            'payment_receipt' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $userDetails = User::find($request->user_id);

            $payment = Payment::create([
                'membershipType' => $request->membershipType,
                'name' => $userDetails->name,
                'cardPayment' => $request->cardPayment,
                'payer_email' => $userDetails->email,
                'user_id' => $userDetails->id,
                'amount' => $request->amount,
                'accepted' => false,
            ]);

            if ($request->hasFile('payment_receipt')) {
                $payment_receipt = $request->file('payment_receipt');
                $imageName = time() . '_' . $payment_receipt->getClientOriginalName();
                $payment_receipt->move(public_path('payment_receipt'), $imageName);
                $payment->payment_receipt = 'payment_receipt/' . $imageName;
                $payment->save();
            }

            // 🔹 Send email notification with membership details
            Mail::to($userDetails->email)->send(new PaymentReceived($payment));
            Session::forget('LoggedIn');
            $request->session()->invalidate();
            return redirect()->route('genThanks')->with('success', 'Una vez que se apruebe su pago, podrá iniciar sesión.');
        } catch (\Exception $e) {
            return back()->with('fail', 'Hubo un error al procesar su pago. Por favor, intente nuevamente.');
        }
    }

}
