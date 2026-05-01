<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Clínica App</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>

        .navbar-clinic {
            background-color: #022e63;
        }

        .navbar-clinic .nav-link {
            color: rgba(255,255,255,0.85);
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .navbar-clinic .nav-link:hover,
        .navbar-clinic .nav-link.active {
            color: #ffffff;
        }

        .brand-logo {
            height: 45px;
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: #ffffff22;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: white;
        }

    </style>

</head>

<body class="bg-light">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-clinic shadow-sm">

        <div class="container">

            <!-- LOGO -->
            <a class="navbar-brand d-flex align-items-center gap-3 fw-semibold"
               href="{{ route('dashboard') }}">

                <img
                    src="{{ asset('svg/Logo_Clinica_areandina.svg') }}"
                    class="brand-logo"
                    alt="Logo"
                >

            </a>

            <!-- RESPONSIVE -->
            <button class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarContent">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse"
                 id="navbarContent">

                <!-- MENU -->
                <ul class="navbar-nav me-auto ms-4">

                    {{-- INICIO --}}
                    <li class="nav-item">

                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active fw-semibold' : '' }}"
                           href="{{ route('dashboard') }}">

                            Inicio

                        </a>

                    </li>

                    {{-- =========================== --}}
                    {{-- ADMINISTRADOR --}}
                    {{-- =========================== --}}
                    @auth

                        @if(Auth::user()->role_id == 1)

                            {{-- PACIENTES --}}
                            <li class="nav-item">

                                <a class="nav-link {{ request()->routeIs('pacientes.*') ? 'active fw-semibold' : '' }}"
                                   href="{{ route('pacientes.index') }}">

                                    Pacientes

                                </a>

                            </li>

                            {{-- MEDICOS --}}
                            <li class="nav-item">

                                <a class="nav-link {{ request()->routeIs('medicos.*') ? 'active fw-semibold' : '' }}"
                                   href="{{ route('medicos.index') }}">

                                    Médicos

                                </a>

                            </li>

                        @endif

                    @endauth

                    {{-- CITAS (TODOS LOS ROLES) --}}
                    <li class="nav-item">

                        <a class="nav-link {{ request()->routeIs('citas.*') ? 'active fw-semibold' : '' }}"
                           href="{{ route('citas.index') }}">

                            Citas

                        </a>

                    </li>

                    {{-- =========================== --}}
                    {{-- CONFIGURACION SOLO ADMIN --}}
                    {{-- =========================== --}}
                    @auth

                        @if(Auth::user()->role_id == 1)

                            <li class="nav-item dropdown">

                                <a class="nav-link dropdown-toggle
                                    {{
                                        request()->routeIs('tipos-cita.*')
                                        || request()->routeIs('centros-medicos.*')
                                        || request()->routeIs('roles.*')
                                        ? 'active fw-semibold'
                                        : ''
                                    }}"
                                   href="#"
                                   role="button"
                                   data-bs-toggle="dropdown">

                                    Configuración

                                </a>

                                <ul class="dropdown-menu shadow border-0 rounded-3">

                                    <li>

                                        <a class="dropdown-item"
                                           href="{{ route('tipos-cita.index') }}">

                                            Tipos de Cita

                                        </a>

                                    </li>

                                    <li>

                                        <a class="dropdown-item"
                                           href="{{ route('centros-medicos.index') }}">

                                            Centros Médicos

                                        </a>

                                    </li>

                                    <li>

                                        <a class="dropdown-item"
                                           href="{{ route('roles.index') }}">

                                            Roles

                                        </a>

                                    </li>

                                </ul>

                            </li>

                        @endif

                    @endauth

                </ul>

                <!-- USUARIO -->
                <div class="d-flex align-items-center gap-3">

                    @auth

                        <div class="user-avatar">

                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

                        </div>

                        <div class="d-flex flex-column">

                            <span class="text-white small fw-medium">

                                {{ Auth::user()->name }}

                            </span>

                            <small class="text-white-50">

                                {{ Auth::user()->role->nombre }}

                            </small>

                        </div>

                        <form method="POST"
                              action="{{ route('logout') }}">

                            @csrf

                            <button class="btn btn-outline-light btn-sm rounded-pill px-3">

                                Salir

                            </button>

                        </form>

                    @endauth

                </div>

            </div>

        </div>

    </nav>

    <!-- CONTENIDO -->
    <main class="py-4">

        <div class="container">

            @yield('content')

        </div>

    </main>

</body>

</html>