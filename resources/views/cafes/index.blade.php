@extends('layouts.app')

@section('content')
<h2 class="mb-4">Cafes</h2>

<div class="row">
@foreach($cafes as $cafe)
    <div class="col-md-4">
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">{{ $cafe->cafe_name }}</h5>
                <p class="card-text">Cafe No: {{ $cafe->cafe_num }}</p>

                <!-- THIS IS WHERE THE LINK GOES -->
               <a href="{{ route('menus.index', $cafe) }}" class="btn btn-outline-primary">
    View Menu
</a>

            </div>
        </div>
    </div>
@endforeach
</div>
@endsection
