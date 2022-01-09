<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ColourFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['green', 'white', 'black', 'blue', 'gray']),
        ];
    }
}
