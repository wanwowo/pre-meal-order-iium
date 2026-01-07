@extends('layouts.app')

@section('content')
<h2>Order Placed Successfully 🎉</h2>

<p>Order ID: #{{ $order->id }}</p>
<p>Total: RM {{ number_format($order->total, 2) }}</p>

<a href="{{ route('orders.index') }}" class="btn btn-primary">
    View Order History
</a>

@endsection
