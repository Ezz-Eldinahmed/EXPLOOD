<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Search extends Component
{
    public $search;
    public $products;

    public function updated()
    {
        $this->products = Product::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('slug', 'like', '%' . $this->search . '%')
            ->orWhere('description', 'like', '%' . $this->search . '%')
            ->take(4)->get();
    }

    public function render()
    {
        return view(
            'livewire.search',
            [
                'products' => $this->products
            ]
        );
    }
}
