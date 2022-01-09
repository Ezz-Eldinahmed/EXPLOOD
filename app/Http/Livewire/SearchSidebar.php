<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SearchSidebar extends Component
{
    public $search;
    public $products = [];
    public $category_id;
    public $lowest = 0;
    public $highest;

    public function mount()
    {
        $this->highest = DB::table('products')->max('price');
    }

    public function render()
    {
        return view('livewire.search-sidebar', ['products' => $this->products, 'categories' => Category::all()]);
    }

    public function updated()
    {
        $query = DB::table('products');

        if (isset($this->search)) {
            $query->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('slug', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%');
        }

        if (isset($this->category_id)) {
            $query->where('category_id', $this->category_id);
        }

        if ($this->lowest != null && $this->highest != null) {
            $query->whereBetween('price',  [$this->lowest, $this->highest]);
        }

        $this->products = $query->take(4)->get();
    }
}
