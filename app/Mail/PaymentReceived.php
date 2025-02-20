<?php

namespace App\Mail;

use App\Models\Payment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $payment;

    /**
     * Create a new message instance.
     */
    public function __construct(Payment $payment)
    {
        $this->payment = $payment;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Confirmación de Pago Recibido')
                    ->view('emails.payment_received')
                    ->with([
                        'name' => $this->payment->name,
                        'membershipType' => $this->payment->membershipType ?? 'No especificado',
                        'amount' => number_format($this->payment->amount, 2),
                        'cardPayment' => $this->payment->cardPayment,
                        'payment_receipt' => $this->payment->payment_receipt ? url($this->payment->payment_receipt) : null,
                    ]);
    }
}
