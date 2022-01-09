<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\ProductSku;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_id' => Order::all()->random()->id,
            'price' => $this->faker->randomFloat(2, 0, 10000),
            'product_sku_id' => ProductSku::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'quantity' => random_int(0, 200)
        ];
    }
}
