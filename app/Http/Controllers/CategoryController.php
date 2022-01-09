<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categories.index', ['categories' => Category::withCount('products')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = Category::create([
            'name' => $request->name,
            'slug' => $request->slug
        ]);

        if ($request->hasFile('image')) {

            $path = Storage::putFile('categories', $request->file('image'));

            $category->image()->create([
                'image' => $path,
                'user_id' => auth()->user()->id
            ]);
        }

        return redirect()->route('categories.create')->with('success', 'Category Added Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('categories.show', ['category' => $category->load('products')]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        if ($request->hasFile('image')) {
            if (isset($category->image['image'])) {
                unlink("storage/" . $category->image['image']);
                $category->image()->delete();
            }

            $path = Storage::putFile('categories', $request->file('image'));

            $category->image()->create([
                'image' => $path,
                'user_id' => auth()->user()->id
            ]);
        }

        $category->update($request->validated());

        return redirect()->route('admin.categories', $category)->with('success', 'Category Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if (isset($category->image['image'])) {
            unlink("storage/" . $category->image['image']);
            $category->image()->delete();
        }

        $category->delete();

        return redirect()->route('admin.categories', $category)->with('success', 'Category Deleted Succesfully');
    }
}
