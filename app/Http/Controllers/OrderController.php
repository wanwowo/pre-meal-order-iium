<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Place Order (from Cart)
     */
    public function store(Request $request)
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')
                ->with('error', 'Your cart is empty.');
        }

        $total = collect($cart)->sum(
            fn ($item) => $item['price'] * $item['quantity']
        );

        // 1️⃣ Create order (PENDING payment)
        $order = Order::create([
            'user_id'        => Auth::id(),
            'total'          => $total,
            'payment_status' => 'pending',
            'order_status'   => 'new',
        ]);

        // 2️⃣ Save order items
        foreach ($cart as $menuId => $item) {
            $order->items()->create([
                'menu_id'  => $menuId,
                'quantity' => $item['quantity'],
                'price'    => $item['price'],
            ]);
        }

        // 3️⃣ Clear cart
        session()->forget('cart');

        return redirect()->route('orders.show', $order->id)
            ->with('success', 'Order placed. Please complete payment.');
    }

    /**
     * Order History
     */
    public function index()
    {
        $orders = auth()->user()
            ->orders()
            ->with('items.menu')
            ->latest()
            ->get();

        return view('orders.index', compact('orders'));
    }

    /**
     * Order Details
     */
    public function show(Order $order)
    {
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        $order->load('items.menu');

        return view('orders.show', compact('order'));
    }

    /**
     * Simulated Payment
     */
    public function pay(Order $order)
    {
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        if ($order->payment_status === 'paid') {
            return back()->with('info', 'Order already paid.');
        }

        $order->update([
            'payment_status' => 'paid',
            'order_status'   => 'preparing',
        ]);

        return back()->with('success', 'Payment successful!');
    }
}
