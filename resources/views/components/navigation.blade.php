<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/cafes') }}">
            Pre-Meal Order IIUM
        </a>

        <div class="d-flex">
            @guest
                <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Login</a>
                <a href="{{ route('register') }}" class="btn btn-light">Register</a>
            @else
                <span class="text-white me-3">
                    Hi, {{ Auth::user()->name }}
                </span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-danger">Logout</button>
                </form>
            @endguest
        </div>
    </div>
</nav>

