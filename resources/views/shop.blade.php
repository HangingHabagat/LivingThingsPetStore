<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Shop</title>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')


        <div class="container mt-4">
            <h2 class="mb-3">Shopping Cart</h2>
            @if(session('success'))
                <div class="alert alert-success">
                {{ session('success') }}
                </div>
            @endif
            @yield('content')
        </div>

        @yield('scripts')

        <div class="d-flex justify-center mx-2 mb-2">

                <a class="btn btn-outline-dark" href="{{ route('shopping.cart') }}">
                    <i class="fa fa-shopping-cart"
                    aria-hidden="true">
                    </i> Cart
                        <span class="badge bg-danger">
                            {{ count((array) session('cart')) }}
                        </span>
                </a>

        </div>
        @include('footer')
    </div>
</body>

</html>
