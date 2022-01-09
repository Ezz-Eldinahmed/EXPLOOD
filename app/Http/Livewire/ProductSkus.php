<?php

namespace App\Http\Livewire;

use App\Models\Colour;
use App\Models\ProductSku;
use App\Models\Size;
use Livewire\Component;

class ProductSkus extends Component
{
    public $productSku;
    public $colour_id;
    public $stock;
    public $name;
    public $size_id;

    public function mount(ProductSku $productSku)
    {
        $this->productSku = $productSku;
        $this->colour_id = $productSku->colour_id;
        $this->stock = $productSku->stock;
        $this->name = $productSku->name;
        $this->size_id = $productSku->size_id;
    }

    public function render()
    {
        return view('livewire.product-skus', ['colours' => Colour::all(), 'sizes' => Size::all()]);
    }

    public function edit()
    {
        $this->productSku->update([
            'colour_id' => $this->colour_id,
            'size_id' => $this->size_id,
            'stock' => $this->stock,
            'name' => $this->name,
        ]);

        session()->flash('success', 'product Sku Updated Successfully');
    }

    public function delete(ProductSku $productSku)
    {
        $productSku->delete();

        session()->flash('success', 'product Sku Deleted Successfully');
    }
}
