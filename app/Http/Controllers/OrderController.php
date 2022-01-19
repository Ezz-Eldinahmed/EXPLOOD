<?php

namespace App\Http\Controllers;

use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('orderItems')->where('user_id', auth()->user()->id)->get();
        return view('orders.index', [
            'orders' => $orders
        ]);
    }
}
