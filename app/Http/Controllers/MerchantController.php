<?php

namespace App\Http\Controllers;

use App\Http\Requests\MerchantRequest;
use App\Models\Category;
use App\Models\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('merchant.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('merchant.create', ['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MerchantRequest $request)
    {
        $merchant = Merchant::create([
            'description' => $request->description,
            'approved' => 0,
            'user_id' => auth()->user()->id
        ]);

        if ($request->hasFile('image')) {

            $path = Storage::putFile('merchants', $request->file('image'));

            $merchant->image()->create([
                'image' => $path,
                'user_id' => auth()->user()->id
            ]);
        }

        foreach ($request->category_id as $category_id) {
            $merchant->categories()->attach(['category_id' => $category_id]);
        }

        return redirect()->route('merchants.create')->with('success', 'Request Sent Successfully');
    }
}
