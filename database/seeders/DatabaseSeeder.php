<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(2)->create();
        \App\Models\Category::factory(2)
            ->has(Product::factory(10))
            ->create();
        \App\Models\Colour::factory(5)->create();
        \App\Models\Size::factory(5)->create();
        \App\Models\ProductSku::factory(10)->create();
        \App\Models\Cart::factory(2)->create();
        \App\Models\CartItem::factory(10)->create();
        \App\Models\Order::factory(2)->create();
        \App\Models\OrderItem::factory(10)->create();
    }
}
