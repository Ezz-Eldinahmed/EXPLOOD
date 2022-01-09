<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index', ['products' => Product::paginate(20)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create', ['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = Product::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'price' => $request->price,
            'user_id' => auth()->user()->id
        ]);

        if ($request->hasFile('image')) {

            $path = Storage::putFile('products', $request->file('image'));

            $product->image()->create([
                'image' => $path,
                'user_id' => auth()->user()->id
            ]);
        }

        return redirect()->route('products.create')->with('success', 'Product Created Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product->load('productSkus'), 'categories' => Category::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        if ($request->hasFile('image')) {
            if (isset($product->image['image'])) {
                unlink("storage/" . $product->image['image']);
                $product->image()->delete();
            }

            $path = Storage::putFile('products', $request->file('image'));

            $product->image()->create([
                'image' => $path,
                'user_id' => auth()->user()->id
            ]);
        }

        $product->update($request->validated());

        return redirect()->route('products.show', $product)->with('success', 'Product Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if (isset($product->image['image'])) {
            unlink("storage/" . $product->image['image']);
            $product->image()->delete();
        }

        $product->delete();

        return redirect()->route('products.index', $product)->with('success', 'Products Deleted Succesfully');
    }
}
