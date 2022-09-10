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

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>

    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-warning shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Pucallpa<span class="fw-bold">Alquila</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @auth
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a href="{{ route('clientes.index') }}" class="nav-link active">Clientes</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('tarjetas.index') }}" class="nav-link active">Tarjetas</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Peliculas</a>
                            <div class="dropdown-menu bg-white">
                                <a class="dropdown-item" href="{{ route('peliculas.index') }}">Peliculas</a>
                                <a class="dropdown-item" href="{{ route('categorias.index') }}">Categorias</a>
                                <a class="dropdown-item" href="{{ route('tipos-peliculas.index') }}">Tipo de Peliculas</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('alquiler.index') }}" class="nav-link active">Alquiler</a>
                        </li>
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Reportes</a>
                            <div class="dropdown-menu bg-white">
                                <a class="dropdown-item" href="{{ route('reporte-link') }}">Links dados de baja</a>
                                <a class="dropdown-item" href="{{ route('reporte-peliculas') }}">Peliculas Alquiladas</a>
                                <a class="dropdown-item" href="{{ route('reporte-peliculas-tipo') }}">Estadistico de Peliculas por Categoria</a>
                                <a class="dropdown-item" href="{{ route('reporte-recargas') }}">Estadistico de Recargas</a>
                                <a class="dropdown-item" href="{{ route('reporte-mas-alquiladas') }}">Estadistico de Peliculas mas Alquiladas</a>
                                <a class="dropdown-item" href="{{ route('reporte-menos-alquiladas') }}">Estadistico de Peliculas menos Alquiladas</a>
                            </div>
                        </li>
                    </ul>
                    @endauth
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Inicie Sesión') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
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
