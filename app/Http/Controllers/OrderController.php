<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class OrderController extends Controller
{
    public function latest()
    {
        $order = Order::where('user_id', Auth::id())
            ->with('orderItems.product')
            ->latest()
            ->first();
        return view('orders.latest', compact('order'));
    }

    public function index()
    {
        $orders = Order::where('user_id', Auth::id())
            ->with('orderItems.product')
            ->latest()
            ->get();
        return view('orders.index', compact('orders'));
    }
}
