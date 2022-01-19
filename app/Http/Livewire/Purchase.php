<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\ProductSku;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Purchase extends Component
{
    public $count = 1;
    public $product;
    public $stock;
    public $size;
    public $colour;
    public $productSku;

    public function render()
    {
        return view('livewire.purchase');
    }

    public function mount($product)
    {
        $this->product = $product;
        foreach ($this->product->productSkus as $productSku) {
            $this->stock += $productSku->stock;
        }
    }

    public function incrementCount()
    {
        $this->count++;
    }

    public function decrementCount()
    {
        if ($this->count > 0)
            $this->count--;
    }

    public function addToCart()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (auth()->user()->cart == null) {
            $cart = Cart::Create(
                [
                    'unique_id' => auth()->user()->id . uniqid(),
                    'user_id' => auth()->user()->id,
                    'number_of_items' => 0
                ]
            );
        } else {
            $cart = auth()->user()->cart;
        }

        if (isset($this->colour) && isset($this->size)) {
            $this->productSku = ProductSku::where('product_id', $this->product->id)
                ->where('colour_id', $this->colour)
                ->Where('size_id', $this->size)->first();

            $this->stock = $this->productSku->count();

            if ($this->productSku->stock >= $this->count) {

                $this->productSku->stock -= $this->count;
                $this->productSku->save();

                $cartItem = CartItem::where('product_sku_id', $this->productSku->id)->where('cart_id', $cart->id)->first();

                if (isset($cartItem)) {
                    $cartItem->quantity += $this->count;
                    $cartItem->save();
                } else {
                    CartItem::create([
                        'cart_id' => $cart->id,
                        'product_sku_id' => $this->productSku->id,
                        'quantity' => $this->count
                    ]);
                }

                $this->emit('reload');

                $this->emit('refresh-cart');

                session()->flash('success', 'Product Added To Cart Successfully');
            } else {
                session()->flash('message', 'Sorry This Product In Stock');
            }
        } else {
            session()->flash('message', 'Please Select Specific Colour & size');
        }
    }
}
