<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\ProductSku;
use Illuminate\Database\Eloquent\Factories\Factory;

class CartItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cart_id' => Cart::all()->random()->id,
            'product_sku_id' => ProductSku::all()->random()->id,
            'quantity' => random_int(0, 200)
        ];
    }
}
