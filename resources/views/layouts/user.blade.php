<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pucallpa Alquila</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
        .parent {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-column-gap: 20px;
            grid-row-gap: 20px;
        }
        .parent2 {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            grid-column-gap: 20px;
            grid-row-gap: 20px;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-warning shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/cliente/home') }}">
                    Pucallpa<span class="fw-bold">Alquila</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @auth
                    @if(auth('tarjetas')->user()->tarjeta_saldo == 0)
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a href="{{ route('cliente-recarga') }}" class="nav-link active">Recarga</a>
                        </li>
                    </ul>
                    @else
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Recargas</a>
                            <div class="dropdown-menu bg-warning">
                                <a class="dropdown-item" href="{{ route('cliente-recarga') }}">Recarga</a>
                                <a class="dropdown-item" href="{{ route('cliente-historial',auth('tarjetas')->user()->id) }}">Historial de Recarga</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('cliente-peliculas') }}" class="nav-link active">Peliculas</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('cliente-mis-alquileres') }}" class="nav-link active">Mis Alquileres</a>
                        </li>
                    </ul>
                    @endif
                    
                    @endauth
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login-cliente') }}">{{ __('Inicie Sesión') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link active me-3" href="{{ route('cart-checkout') }}"><i class="uil uil-shopping-cart-alt"></i>({{count(Cart::getContent())}})</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ auth('tarjetas')->user()->cliente->cliente_nombre }} {{ auth('tarjetas')->user()->cliente->cliente_apellido }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('cliente-perfil') }}">
                                        {{ __('Perfil') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('cliente-movimientos',auth('tarjetas')->user()->id) }}">
                                        {{ __('Ultimos Movimientos') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout-cliente') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    
    @yield('js')
</body>
</html>
