<!DOCTYPE html> 
<html lang="es">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-light">

    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">

            <div class="col-md-5 col-lg-4">

                <div class="text-center mb-4">
                    <img src="{{ asset('svg/Logo_Clinica_areandina.svg') }}" 
                         alt="Logo" width="300">
                    
                </div>

                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <h4 class="fw-bold mt-3">Bienvenido</h4>
                            <p class="text-muted small">Ingresa tus credenciales</p>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email -->
                            <div class="form-floating mb-3">
                                <input
                                    type="email"
                                    name="email"
                                    id="email"
                                    class="form-control"
                                    placeholder="correo@ejemplo.com"
                                    required
                                >
                                <label for="email">Correo electrónico</label>
                            </div>

                            <!-- Password -->
                            <div class="form-floating mb-3">
                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    class="form-control"
                                    placeholder="Contraseña"
                                    required
                                >
                                <label for="password">Contraseña</label>
                            </div>

                            <!-- Recordar -->
                            <div class="form-check mb-3">
                                <input class="form-check-input" 
                                       type="checkbox" 
                                       name="remember" 
                                       id="remember">
                                <label class="form-check-label" for="remember">
                                    Recordarme
                                </label>
                            </div>

                            <!-- Botón -->
                            <button class="btn btn-primary w-100 py-2 fw-semibold">
                                Ingresar
                            </button>

                            <!-- Olvidé contraseña -->
                            <div class="text-center mt-3">
                                <a href="#" class="text-decoration-none small">
                                    ¿Olvidaste tu contraseña?
                                </a>
                            </div>

                            <!-- Divider -->
                            <div class="d-flex align-items-center my-3">
                                <hr class="flex-grow-1">
                                <span class="mx-2 text-muted small">o</span>
                                <hr class="flex-grow-1">
                            </div>

                            <!-- Crear cuenta -->
                            <div class="d-grid">
                                <a href="{{ route('register') }}" 
                                class="btn btn-outline-primary py-2 fw-semibold">
                                    Crear cuenta
                                </a>
                            </div>

                        </form>

                    </div>
                </div>

                <p class="text-center text-muted small mt-4">
                    © {{ date('Y') }} Clínica Areandina. Todos los derechos reservados.
                </p>

            </div>

        </div>
    </div>

</body>
</html>