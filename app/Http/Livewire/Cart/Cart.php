<?php

namespace App\Http\Livewire\Cart;

use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Cart extends Component
{
    public $show;

    protected $listeners = [
        'showCart', 'hideCart', '$refresh', 'refresh-cart' => 'refreshCart'
    ];

    public function render()
    {
        if (Auth::check() && isset(auth()->user()->cart)) {
            $cartItems = CartItem::where('cart_id', auth()->user()->cart->id)
                ->with(['productSku'])->get();

            return view('livewire.cart.cart', [
                'cartItems' => $cartItems
            ]);
        }
        return view('livewire.cart.cart');
    }

    public function showCart()
    {
        $this->show = true;
    }

    public function hideCart()
    {
        $this->show = false;
    }

    public function delete(CartItem $cartItem)
    {
        $cartItem->productSku->stock += $cartItem->quantity;
        $cartItem->productSku->save();

        $cartItem->delete();

        session()->flash('success', 'Product Added To Cart Successfully');

        $this->emit('reload');
    }

    public function increment(CartItem $cartItem)
    {
        $cartItem->quantity++;
        $cartItem->save();

        $cartItem->productSku->stock--;
        $cartItem->productSku->save();

        $this->emit('reload');
    }

    public function decrement(CartItem $cartItem)
    {
        if ($cartItem->quantity > 1) {
            $cartItem->quantity--;
            $cartItem->save();
        }

        $cartItem->productSku->stock++;
        $cartItem->productSku->save();

        $this->emit('reload');
    }

    public function orderNow()
    {
        $orderQuantity = 0;
        $totalPrice = 0;

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'shipping_cost' => 15,
            'status' => 'pending',
            'quantity' => $orderQuantity,
            'total' => $totalPrice,
        ]);

        foreach (auth()->user()->cart->cartItems as $cartItem) {
            $orderQuantity += $cartItem->quantity;
            $totalPrice += $cartItem->quantity * $cartItem->productSku->product->price;
            OrderItem::create([
                'order_id' => $order->id,
                'user_id' => auth()->user()->id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->quantity * $cartItem->productSku->product->price,
                'product_sku_id' => $cartItem->productSku->id
            ]);
        }

        $order->update([
            'quantity' => $orderQuantity,
            'total' => $totalPrice + 15,
        ]);

        return redirect()->route('payment', $order);
    }

    public function refreshCart()
    {
        $this->render();
    }
}
