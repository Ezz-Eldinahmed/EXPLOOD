<?php

namespace Database\Factories;

use App\Models\ProductSku;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'total' => $this->faker->randomFloat(2, 0, 10000),
            'shipping_cost' => $this->faker->randomFloat(2, 0, 10000),
            'user_id' => User::all()->random()->id,
            'quantity' => random_int(0, 200),
            'status' => $this->faker->name,
        ];
    }
}
