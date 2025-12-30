<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pre-Meal Order IIUM</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light">

@include('components.navigation')

<div class="container my-5">
    @yield('content')
</div>

<footer class="bg-dark text-white text-center py-3 mt-5">
    <small>© {{ date('Y') }} IIUM Pre-Meal Order System</small>
</footer>

</body>
</html>

