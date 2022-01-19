<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;

class ShowCartButton extends Component
{
    protected $listeners = [
        'reload' => 'reload'
    ];

    public function render()
    {
        return view('livewire.cart.show-cart-button', [
            'cart' => (isset(auth()->user()->cart)) ? auth()->user()->cart->number_of_items : 0
        ]);
    }

    public function reload()
    {
        $number = 0;
        foreach (auth()->user()->cart->cartItems as $cartItem) {
            $number += $cartItem->quantity;
        }
        auth()->user()->cart->number_of_items = $number;
        auth()->user()->cart->save();

        $this->render();
    }
}
