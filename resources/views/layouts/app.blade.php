<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sertifikasi') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .sidebar {
            min-height: 100vh;
            background-color: #0d1b2a;
            color: #fff;
        }

        .sidebar a {
            color: #adb5bd;
            text-decoration: none;
            padding: 12px 20px;
            display: block;
            border-radius: 6px;
            margin-bottom: 5px;
            font-weight: 500;
        }

        .sidebar a:hover,
        .sidebar a.active {
            color: #fff;
            background-color: #1b263b;
        }
    </style>
</head>

<body>
    <div id="app">
        @auth
        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar Kiri -->
                <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar collapse p-3">
                    <div class="position-sticky">
                        <h4 class="text-white py-3 px-2 mb-4 border-bottom border-secondary">
                            Sertifikasi
                        </h4>
                        <ul class="nav flex-column">
                            <!-- Menu Dashboard Ditambahkan di Sini -->
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                                    Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('skemas.*') ? 'active' : '' }}" href="{{ route('skemas.index') }}">
                                    Skema
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('pesertas.*') ? 'active' : '' }}" href="{{ route('pesertas.index') }}">
                                    Peserta
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <!-- Kandungan Utama di Kanan -->
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom bg-white p-3 rounded shadow-sm">
                        <h1 class="h4 m-0 text-dark">Aplikasi Sertifikasi</h1>
                        <div class="dropdown">
                            <a id="navbarDropdown" class="btn btn-light dropdown-toggle border" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                👤 {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                    @yield('content')
                </main>
            </div>
        </div>
        @else
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Sertifikasi
                </a>
                <div class="ms-auto">
                    @if (Route::has('login'))
                    <a class="btn btn-outline-primary me-2" href="{{ route('login') }}">Login</a>
                    @endif
                    @if (Route::has('register'))
                    <a class="btn btn-primary" href="{{ route('register') }}">Register</a>
                    @endif
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
        @endauth
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>