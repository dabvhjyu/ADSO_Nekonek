<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome (para íconos) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- CSS personalizado -->
    <style>
        /* Estilos personalizados */
        .navbar, .header-bg {
            background-color: #2e1640 !important;
        }
        .navbar {
            padding: 0.5rem 0;
        }
        .nav-link {
            font-family: "Rockwell", "Courier New", serif;
            font-size: 1.1rem;
            color: white !important;
            transition: color 0.3s;
        }
        .nav-link:hover {
            color: #d0b8e6 !important;
        }
        .btn-primary {
            background-color: #452160 !important;
            border-color: #452160 !important;
        }
        .btn-secondary {
            background-color: #6a3493 !important;
            border-color: #6a3493 !important;
        }
        .form-control {
            background-color: rgba(255, 255, 255, 0.15) !important;
        }
        .form-control::placeholder {
            color: rgba(36, 22, 22, 0.7) !important;
        }
        
        /* Estilos para mejorar el responsive */
        @media (max-width: 991.98px) {
            .navbar-search-form {
                margin-bottom: 1rem;
            }
            
            .auth-buttons {
                margin-top: 1rem;
                margin-bottom: 0.5rem;
                display: flex;
                justify-content: flex-start;
                width: 100%;
            }
            
            .nav-item {
                padding: 0.25rem 0;
            }
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <header class="header-bg text-white sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <!-- Logo -->
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo de la aplicación" width="110" height="50">
                </a>
                <!-- Botón para menú móvil -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Menú de navegación -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" >Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Biblioteca</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Nosotros</a>
                        </li>
                    </ul>
                    <!-- Barra de búsqueda -->
                    <form class="d-flex me-3 navbar-search-form">
                        <input class="form-control me-2" type="search" placeholder="Buscar series..." aria-label="Buscar">
                        <button class="btn btn-outline-light" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                    <!-- Botones de autenticación -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item" >
                                    <a class="btn btn-primary me-2" href="{{ route('login') }}">{{ __('Iniciar Sesion') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item" class="btn btn-secondary">
                                    <a class="btn btn-secondary" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
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
                                        {{ __('cerrar sesion') }}
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
        </div>
    </header>

    <!-- Contenido principal -->
    <main class="py-4">
        @yield('content')
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Script para asegurar que el menú se pueda colapsar -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Obtener el botón de hamburguesa
            const navbarToggler = document.querySelector('.navbar-toggler');
            // Obtener el contenedor del menú colapsable
            const navbarCollapse = document.querySelector('.navbar-collapse');
            
            // Verificar si los elementos existen
            if (navbarToggler && navbarCollapse) {
                // Agregar evento de clic al botón
                navbarToggler.addEventListener('click', function() {
                    // Alternar la clase 'show' en el menú colapsable
                    navbarCollapse.classList.toggle('show');
                });
                
                // Cerrar el menú cuando se hace clic en un enlace
                const navLinks = document.querySelectorAll('.nav-link');
                navLinks.forEach(function(link) {
                    link.addEventListener('click', function() {
                        navbarCollapse.classList.remove('show');
                    });
                });
            }
        });
    </script>
</body>
</html>


