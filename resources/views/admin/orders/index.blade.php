@extends('layouts.app')

@section('content')
<h2>Admin – Orders</h2>

<table class="table table-bordered">
<thead class="table-dark">
<tr>
    <th>ID</th>
    <th>User</th>
    <th>Total</th>
    <th>Payment</th>
    <th>Status</th>
    <th>Action</th>
</tr>
</thead>
<tbody>
@foreach($orders as $order)
<tr>
    <td>{{ $order->id }}</td>
    <td>{{ $order->user->name }}</td>
    <td>RM {{ number_format($order->total,2) }}</td>
    <td>{{ ucfirst($order->payment_status) }}</td>

    <td>
        <form method="POST" action="{{ route('admin.orders.update', $order) }}">
            @csrf @method('PATCH')
            <select name="order_status" class="form-select">
                @foreach(['new','preparing','ready','completed'] as $status)
                    <option value="{{ $status }}"
                        @selected($order->order_status === $status)>
                        {{ ucfirst($status) }}
                    </option>
                @endforeach
            </select>
    </td>

    <td>
        <button class="btn btn-sm btn-primary">Update</button>
        </form>
    </td>
</tr>
@endforeach
</tbody>
</table>
@endsection
