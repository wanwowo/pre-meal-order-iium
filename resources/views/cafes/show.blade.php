@extends('layouts.app')

@section('content')

<h1 class="mb-4">{{ $cafe->cafe_name }} Menu</h1>

@if ($cafe->menus->count() > 0)
    <div class="row">
        @foreach ($cafe->menus as $menu)
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $menu->name }}</h5>
                        <p class="card-text">{{ $menu->description }}</p>
                        <p class="fw-bold">RM {{ number_format($menu->price, 2) }}</p>
                        <button class="btn btn-outline-success" disabled>
                            Order (Coming Soon)
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <p>No menu available.</p>
@endif

<a href="/cafes" class="btn btn-secondary mt-4">⬅ Back to Cafes</a>

@endsection
