<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryAdmin extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.category-admin', ['categories' => Category::with('image')->withCount('products')->paginate(10)]);
    }
}
