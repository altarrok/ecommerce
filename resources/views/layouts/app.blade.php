<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Altayo E-Commerce System
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            @if(\Illuminate\Support\Facades\Auth::user()->account instanceof \App\SellerAccount)
                                <li class="nav-item">
                                    <a href="/sellerAccount" class="nav-link"> Market Panel </a>
                                </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->account->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @guest()
            @elseif(\Illuminate\Support\Facades\Auth::user()->account instanceof \App\CustomerAccount)
        <div class="float-right pr-5 pt-2 border-left border-dark pl-2 border-bottom">
            <div class="d-flex flex-column">
                <span class="h1 mb-4"><a class="text-dark" href="/shoppingCart">Shopping Cart</a></span>
                <?php $totalCost = 0; ?>
                @foreach(auth()->user()->account->shoppingCart->products as $product)
                <div class="row pl-2 pr-2 mb-4">
                    <div class="col-9"><a href="/product/{{$product->id}}" class="text-dark">{{ \Illuminate\Support\Str::limit($product->name, 20, "") }}</a></div>
                    <div class="col-3 text-dark">{{ $product->price }}$</div>
                </div>
                    <?php $totalCost += $product->price; ?>
                @endforeach
                <div class="row pl-4 pr-2 mb-4">
                    Total : {{ $totalCost }} $
                </div>
                @if($totalCost != 0)
                <div class="row pl-4 pr-2 mb-4">
                    <a href="/checkout" class="btn btn-outline-primary w-100" role="button">Checkout</a>
                </div>
                @endif
            </div>
        </div>
        @endguest

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
