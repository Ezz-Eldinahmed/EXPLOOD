<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout(Order $order)
    {
        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey('sk_test_51HyGgPLfxWT4kkmEgV7XQptGezV13HWu4HuSq4sQM5dFDEa5AMs6EDPLyToHhSeyaikHqKUZ359KvvCvcf5mYXnA00mxUeXoMs');

        $payment_intent = \Stripe\PaymentIntent::create([
            'description' => 'EXPLOOD PAYMENT',
            'amount' => $order->total * 100,
            'currency' => 'USD',
            'description' => 'Payment From ' . auth()->user()->name,
            'payment_method_types' => ['card'],
        ]);

        $intent = $payment_intent->client_secret;

        return view('payment', ['intent' => $intent, 'order' => $order]);
    }

    public function afterPayment(Order $order)
    {
        $order->update([
            'status' => 'paid and ready to be prepared'
        ]);

        foreach (auth()->user()->cart->cartItems as $cartItem) {
            $cartItem->delete();
        }

        auth()->user()->cart->delete();

        return redirect()->route('home');
    }
}
