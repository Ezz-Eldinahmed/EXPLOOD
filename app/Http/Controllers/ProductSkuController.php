<?php

namespace App\Http\Controllers;

use App\Models\Colour;
use App\Models\Product;
use App\Models\ProductSku;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductSkuController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        return view('product-skus.create', [
            'product' => $product->id,
            'colours' => Colour::all(),
            'sizes' => Size::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        ProductSku::create([
            'stock' => $request->stock,
            'name' => $request->name,
            'product_id' => $product->id,
            'colour_id' => $request->colour_id,
            'size_id' => $request->size_id,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->back()->with('success', 'Product Sku Added');
    }
}
