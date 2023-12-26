<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\PaymentController;
use App\Models\Payment;
use App\Models\Event;



class StripeController extends Controller
{
    public function createCheckoutSession($paymentId)
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        $payment = Payment::find($paymentId);
        $event = Event::find($payment->event_id);

        if (!$event) {
            return abort(404);
        }

        $quantity = $payment->quantity ?? 1;
        $totalPrice = $payment->total_harga ?? 0;

        // Konversi total harga ke cent (kalikan dengan 100)
        $totalPriceInCent = $totalPrice * 100;

        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'IDR',
                        'product_data' => [
                            'name' => $event->name,
                        ],
                        'unit_amount'  => $totalPriceInCent,
                    ],
                    'quantity'   => 1,
                ],
            ],
            'mode'        => 'payment',
            'success_url' => route('success'),
            'cancel_url'  => route('checkout'),
        ]);

        // Redirect ke halaman checkout Stripe
        return Redirect::to($session->url);
    }

    public function success()
    {

        return redirect()->route('UserDashboard')->with('success', 'Payment successful!');
    }
}
