<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    // Show all orders
    public function index()
    {
        $orders = Order::all(); // fetch all orders
        return view('orders.index', compact('orders'));
    }

    // Show form to create a new order
    public function create()
    {
        return view('orders.create');
    }

    // Store a new order
    public function store(Request $request)
    {
        $request->validate([
            'order_date' => 'required|date',
            'order_status' => 'required|string',
            'user_id' => 'required|exists:users,user_id',
            'cafe_id' => 'required|exists:cafes,cafe_id',
        ]);

        Order::create($request->all());

        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    // Show a single order
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    // Show form to edit an order
    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    // Update an order
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'order_date' => 'required|date',
            'order_status' => 'required|string',
        ]);

        $order->update($request->all());

        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    // Delete an order
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}