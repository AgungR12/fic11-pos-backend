<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // index
    public function index()
    {
        // with untuk belongTo order
        $orders = Order::with('kasir')->orderBy('created_at', 'desc')->paginate(10);

        return view('pages.orders.index', compact('orders'));
    }

    //create
    public function show($id)
    {
        $order = Order::with('kasir')->findOrFail($id);
        // get order items by order id
        $orderItems = OrderItem::with('product')->where('order_id', $id)->get();

        return view('pages.orders.view', compact('order', 'orderItems'));
    }
}
