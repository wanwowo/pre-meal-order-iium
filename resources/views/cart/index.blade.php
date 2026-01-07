@extends('layouts.app')

@section('content')
<h2 class="mb-4">Your Cart</h2>

@if(count($cart) > 0)
<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Item</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Total</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @php $grandTotal = 0; @endphp

        @foreach($cart as $id => $item)
            @php 
                $total = $item['price'] * $item['quantity'];
                $grandTotal += $total;
            @endphp
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>RM {{ number_format($item['price'],2) }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td>RM {{ number_format($total,2) }}</td>
                <td>
                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Remove</button>
                    </form>
                </td>
            </tr>
        @endforeach

        <tr class="table-secondary">
            <td colspan="3"><strong>Grand Total</strong></td>
            <td colspan="2"><strong>RM {{ number_format($grandTotal,2) }}</strong></td>
        </tr>
    </tbody>
</table>

{{-- ✅ PLACE ORDER BUTTON --}}
<form action="{{ route('orders.store') }}" method="POST">
    @csrf
    <button class="btn btn-primary">Place Order</button>
</form>
<a href="{{ route('orders.index') }}" class="btn btn-outline-dark">
    Order History
</a>


@else
<p>Your cart is empty.</p>
@endif
@endsection

