@extends('layouts.app')

@section('content')
<h3>Order #{{ $order->id }}</h3>

<p><strong>Date:</strong> {{ $order->created_at->format('d M Y') }}</p>
<p><strong>Total:</strong> RM {{ number_format($order->total,2) }}</p>
<p><strong>Payment:</strong> {{ ucfirst($order->payment_status) }}</p>
<p><strong>Status:</strong> {{ ucfirst($order->order_status) }}</p>

<table class="table table-bordered mt-3">
    <thead class="table-dark">
        <tr>
            <th>Food</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($order->items as $item)
        <tr>
            <td>{{ $item->menu->name }}</td>
            <td>RM {{ number_format($item->price,2) }}</td>
            <td>{{ $item->quantity }}</td>
            <td>RM {{ number_format($item->price * $item->quantity,2) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@if($order->payment_status === 'pending')
<form method="POST" action="{{ route('orders.pay', $order->id) }}">
    @csrf
    <button class="btn btn-success">Pay Now</button>
</form>
@endif

<a href="{{ route('orders.index') }}" class="btn btn-secondary mt-2">
    Back to Orders
</a>
@endsection
