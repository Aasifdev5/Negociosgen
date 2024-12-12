<?php

namespace App\Http\Controllers;

use App\Mail\OrderPlaced;

use App\Models\Payment;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
        $userDetails = User::find($request->user_id);


        // Create a new payment
        $payment = Payment::create([
            'membershipType' => $request->membershipType,
            'name' => $userDetails->name,
            'payer_email' => $userDetails->email,
            'user_id' => $userDetails->id,
            'amount' => $request->amount,
            'accepted' => false,
        ]);

        if ($request->hasFile('payment_receipt')) {
            $payment_receipt = $request->file('payment_receipt');
            $imageName = $payment_receipt->getClientOriginalName();
            $payment_receipt->move(public_path('payment_receipt'), $imageName);
            $payment->payment_receipt = 'payment_receipt/' . $imageName;
            $payment->save();
        }


        return back()->with('success', 'Una vez que se apruebe su pago, podrá iniciar sesión');
    }
}
