@extends('layouts.auth')

@section('content')
<div class="card shadow">
    <div class="card-body p-4">
        <h3 class="text-center mb-4">Login</h3>

        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required autofocus>
                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
                @error('password') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="d-flex justify-content-between mb-3">
                <div class="form-check">
                    <input type="checkbox" name="remember" class="form-check-input">
                    <label class="form-check-label">Remember me</label>
                </div>

                <a href="{{ route('password.request') }}">Forgot password?</a>
            </div>

            <button class="btn btn-primary w-100">Login</button>

            <p class="text-center mt-3">
                Don’t have an account?
                <a href="{{ route('register') }}">Register</a>
            </p>
        </form>
    </div>
</div>
@endsection
