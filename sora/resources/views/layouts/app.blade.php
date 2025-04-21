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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Font Awesome para íconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        /* Paleta de colores personalizada */
        :root {
            --color-primary: #1b1020;
            --color-secondary: #350a4e;
            --color-tertiary: #3e0c5a;
            --color-quaternary: #43165c;
            --color-login: rgb(52, 18, 72);
            --color-register: #572364;
            --element-height: 38px;
            /* Variable común para altura de elementos */
        }

        body {
            font-family: 'Poppins', 'Nunito', sans-serif !important;
            background-color: #f8f5fc;
        }

        /* Añade esto al inicio de tu CSS para sobrescribir cualquier !important */
        header,
        .header-menu,
        .header-menu a {
            font-size: 1rem !important;
            /* Tamaño fijo que no cambiará */
            transition: none !important;
            /* Elimina transiciones no deseadas */
        }

        /* Especifica estilos para las pestañas/tabs */
        .tab {
            font-size: 1rem !important;
            /* Fuerza tamaño consistente */
            padding: 15px 20px !important;
        }

        .tab.active {
            font-size: 1rem !important;
            /* Mantiene el mismo tamaño cuando está activo */
        }


        /* Estilos de la barra de navegación */
        .navbar {
            background-color: var(--color-primary) !important;
            padding: 0.8rem 1rem !important;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1) !important;
        }

        .navbar-brand,
        .nav-link {
            color: white !important;
            font-weight: 500 !important;
        }

        .navbar-brand {
            font-size: 1.4rem !important;
            letter-spacing: 0.5px !important;
        }

        .brand-logo {
            height: 40px !important;
            width: auto !important;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.2)) !important;
        }

        .nav-link {
            position: relative !important;
            margin: 0 5px !important;
            padding: 8px 15px !important;
            transition: all 0.3s ease !important;
        }

        .nav-link::after {
            content: '' !important;
            position: absolute !important;
            bottom: 0 !important;
            left: 50% !important;
            width: 0 !important;
            height: 2px !important;
            background-color: var(--color-register) !important;
            transition: all 0.3s ease !important;
            transform: translateX(-50%) !important;
        }

        .nav-link:hover::after {
            width: 70% !important;
        }

        .navbar-brand:hover,
        .nav-link:hover {
            color: #e0c5ff !important;
        }

        /* Estilos para el logo */
        .navbar-brand img {
            max-height: 40px !important;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.2)) !important;
        }

        /* Estilos para el botón de búsqueda */
        .form-inline {
            display: flex !important;
            align-items: center !important;
        }

        .form-control {
            margin-right: 1px !important;
            /* Espacio entre la barra y el botón */
        }

        /* Estilos para el dropdown */

        /* Estilos corregidos para dropdown */
        .dropdown-menu {
            background-color: #1b1020 !important;
            border: 1px solid var(--color-tertiary) !important;
            /* Borde sutil */
            border-radius: 8px !important;
            padding: 0 !important;
            /* Elimina padding que causa líneas */
            overflow: hidden !important;
            /* Oculta cualquier desbordamiento */
        }

        .dropdown-item {
            color: white !important;
            background-color: transparent !important;
            /* Fondo transparente */
            padding: 0.75rem 1.5rem !important;
            margin: 0 !important;
            border: none !important;
            /* Elimina bordes */
            transition: background-color 0.2s ease !important;
        }

        .dropdown-item:hover {
            background-color: var(--color-tertiary) !important;
            color: white !important;
        }

        /* Elimina espacios entre items */
        .dropdown-item:not(:last-child) {
            border-bottom: none !important;
        }



        /* Estilos para el input de búsqueda */
        .search-bar {
            display: flex !important;
            align-items: center !important;
            background-color: #f8f9fa !important;
            /* Fondo claro */
            padding: 8px !important;
            border-radius: 25px !important;
            /* Bordes redondeados */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1) !important;
            /* Sombra suave */
        }



        .search-bar input {
            border: none !important;
            outline: none !important;
            background: transparent !important;
            flex: 1 !important;
            padding: 0 10px !important;
            font-size: 16px !important;
        }

        .search-bar button {
            background: none !important;
            border: none !important;
            color: rgb(244, 245, 245) !important;
            /* Color gris para el ícono */
            cursor: pointer !important;
            padding: 8px !important;
        }


        .btn.btn-outline-success.my-2.my-sm-0:hover {
            background-color: rgb(90, 32, 123) !important;
            /* Cambia el color de fondo al pasar el mouse */
            transform: translateY(-2px) !important;
            /* Mueve el botón ligeramente hacia arriba */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2) !important;
            /* Agrega una sombra */
            transition: all 0.3s ease !important;
            /* Suaviza la transición */
        }


        /* Estilos para los botones de login y register */
        #login-button,
        #register-button {
            height: var(--element-height) !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            padding: 0 20px !important;
            border-radius: 8px !important;
            transition: all 0.3s ease !important;
            font-weight: 500 !important;
            letter-spacing: 0.5px !important;
        }

        #login-button {
            background-color: var(--color-login) !important;
            color: white !important;
            margin-right: 15px !important;
            /* Aumentado de 10px a 15px para más separación */
        }

        #login-button:hover {
            background-color: rgb(90, 32, 123) !important;
            transform: translateY(-2px) !important;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2) !important;
        }

        #register-button {
            background-color: var(--color-register) !important;
            color: white !important;
        }

        #register-button:hover {
            background-color: #683475 !important;
            transform: translateY(-2px) !important;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2) !important;
        }

        /* Estilos para el dropdown del usuario */
        .nav-item.dropdown .nav-link {
            display: flex !important;
            align-items: center !important;
            height: var(--element-height) !important;
        }

        .nav-item.dropdown .nav-link::after {
            display: none !important;
        }

        /* Estilos para el contenido principal */
        main {
            min-height: calc(100vh - 76px) !important;
        }

        /* Estilos para el botón hamburguesa en móvil */
        .navbar-toggler {
            border-color: rgba(255, 255, 255, 0.96) !important;
            padding: 0.5rem !important;
        }

        .navbar-toggler:focus {
            box-shadow: 0 0 0 0.25rem rgba(255, 255, 255, 0.94) !important;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.8%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        /* Asegurar que los botones de autenticación mantengan su separación */
        .auth-buttons-container {
            display: flex !important;
            gap: 1px !important;
            /* Espacio fijo entre botones */
        }

        @media (max-width: 991.98px) {
            .search-form {
                margin-left: 0 !important;
                margin-top: 10px !important;
                width: 100% !important;
            }

            #login-button,
            #register-button {
                display: flex !important;
                margin: 5px 0 !important;
                text-align: center !important;
                width: 100% !important;
                justify-content: center !important;
            }

            .navbar-nav .nav-link {
                padding: 12px 15px !important;
                border-bottom: 1px solid rgba(255, 255, 255, 0.1) !important;
            }

            .navbar-nav .nav-link::after {
                display: none !important;
            }



            /* Mantener separación en móvil */
            .auth-buttons-container {
                flex-direction: column !important;
                gap: 10px !important;
            }

            #login-button {
                margin-right: 0 !important;
                /* Eliminar margen en móvil ya que usamos gap */
            }
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="brand-logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('biblioteca') }}">Biblioteca</a>
                        </li>
                        <!-- Barra de búsqueda justo después de Biblioteca -->


                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            <ul class="navbar-nav ms-auto d-flex gap-2">
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}"
                                            id="login-button">{{ __('Iniciar Sesion') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}"
                                            id="register-button">{{ __('Registrarse') }}</a>
                                    </li>
                                @endif
                            </ul>

                        @else
                        
                            @if (Auth::user()->rol_id_fk == '1')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('administrador') }}">
                                        <i class="fas fa-user-shield me-2"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('series/configuracion') }}">
                                        <i class="fas fa-bell me-2"></i>
                                    </a>
                                </li>
                            @endif
                            @if (Auth::user()->rol_id_fk == '3')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/grupo') }}">
                                        <i class="fas fa-users me-2"></i>
                                    </a>
                                </li>
                            @endif
                            @if (Auth::user()->rol_id_fk == '2')
                                

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('series/creargrupo') }}" data-bs-toggle="tooltip"
                                        title="Crear Grupo">
                                        <i class="fas fa-users-cog"></i> <!-- Icono de grupos con configuración -->
                                    </a>
                                </li>

                            @endif



                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('perfil') }}">
                                        <i class="fas fa-user-circle me-2"></i>{{ __('Mi Perfil') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ url('neko/guardado') }}">
                                        <i class="fas fa-user-circle me-2"></i>{{ __('Guardado') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                                                                 document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt me-2"></i>{{ __('Cerrar Sesion') }}
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

        <main>
            @yield('content')
        </main>
    </div>
</body>

</html>