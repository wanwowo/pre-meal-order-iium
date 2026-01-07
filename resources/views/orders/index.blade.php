@extends('layouts.app')

@section('content')
<h2 class="mb-4">Order History</h2>

@if($orders->count())
<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Date</th>
            <th>Total (RM)</th>
            <th>Items</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->created_at->format('d M Y, h:i A') }}</td>
            <td>{{ number_format($order->total, 2) }}</td>
            <td>
                <ul class="mb-0">
                    @foreach($order->items as $item)
                        <li>{{ $item->menu->name }} × {{ $item->quantity }}</li>
                    @endforeach
                </ul>
            </td>
            <td>
                <a href="{{ route('orders.show', $order->id) }}"
                   class="btn btn-sm btn-outline-primary">
                    View
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p>You have no orders yet.</p>
@endif
@endsection
