<?php

namespace Database\Factories;

use App\Models\Colour;
use App\Models\Product;
use App\Models\Size;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductSkuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'stock' => random_int(2, 1000),
            'product_id' =>  Product::all()->random()->id,
            'colour_id' =>  Colour::all()->random()->id,
            'size_id' =>  Size::all()->random()->id,
            'user_id' =>  User::all()->random()->id,
        ];
    }
}
