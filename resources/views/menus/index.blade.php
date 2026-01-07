@extends('layouts.app')

@section('content')
<h3 class="mb-4">Menu</h3>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="row">
@foreach($menus as $menu)
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5>{{ $menu->name }}</h5>
                <p>RM {{ $menu->price }}</p>

                <form method="POST" action="{{ route('orders.store') }}">
                    @csrf
                    <input type="hidden" name="menu_id" value="{{ $menu->id }}">

                    <div class="mb-2">
                        <input type="number" name="quantity" min="1" value="1"
                               class="form-control" required>
                    </div>

                    <button class="btn btn-primary w-100">
                        Order
                    </button>
                </form>
                <form action="{{ route('cart.add', $menu->id) }}" method="POST">
    @csrf
    <button class="btn btn-success btn-sm mt-2">Add to Cart</button>
</form>

            </div>
        </div>
    </div>
@endforeach
</div>
@endsection
