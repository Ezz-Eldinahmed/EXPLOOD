<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class LatestOrder extends Component
{
    public function render()
    {
        return view('livewire.latest-order', ['orders' => Order::latest()->take(10)->get()]);
    }
}
