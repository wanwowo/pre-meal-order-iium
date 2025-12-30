@extends('layouts.app')

@section('content')

<h1 class="mb-4 text-center">Available Cafes</h1>

<div class="row">
    @foreach ($cafes as $cafe)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">{{ $cafe->cafe_name }}</h5>
                    <p class="card-text">
                        Cafe Number: {{ $cafe->cafe_num }}
                    </p>
                    <a href="/cafes/{{ $cafe->id }}" class="btn btn-success">
                        View Menu
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection
