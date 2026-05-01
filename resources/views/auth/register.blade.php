@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center align-items-center vh-100">

        <div class="col-md-6 col-lg-5">

            <!-- Logo + Header -->
            <div class="text-center mb-4">
                <img src="{{ asset('svg/Logo_Clinica_areandina.svg') }}" 
                     alt="Logo" width="300">

                <h4 class="fw-bold mt-3">Crear cuenta</h4>

                <p class="text-muted small">
                    Sistema de Gestión Clínica
                </p>
            </div>

            <!-- Card -->
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-4">

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Nombre -->
                        <div class="form-floating mb-3">
                            <input type="text"
                                   name="name"
                                   id="name"
                                   class="form-control @error('name') is-invalid @enderror"
                                   placeholder="Nombre completo"
                                   value="{{ old('name') }}"
                                   required>
                            <label for="name">Nombre completo</label>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="form-floating mb-3">
                            <input type="email"
                                   name="email"
                                   id="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   placeholder="correo@ejemplo.com"
                                   value="{{ old('email') }}"
                                   required>
                            <label for="email">Correo electrónico</label>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Cédula -->
                        <div class="form-floating mb-3">
                            <input type="text"
                                   name="cedula"
                                   id="cedula"
                                   class="form-control @error('cedula') is-invalid @enderror"
                                   placeholder="Cédula"
                                   value="{{ old('cedula') }}"
                                   required>
                            <label for="cedula">Cédula</label>
                            @error('cedula')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Fecha nacimiento -->
                        <div class="form-floating mb-3">
                            <input type="date"
                                   name="fecha_nacimiento"
                                   id="fecha_nacimiento"
                                   class="form-control @error('fecha_nacimiento') is-invalid @enderror"
                                   required>
                            <label for="fecha_nacimiento">Fecha de nacimiento</label>
                        </div>

                        <!-- RH -->
                        <div class="form-floating mb-3">
                            <select name="rh"
                                    id="rh"
                                    class="form-select @error('rh') is-invalid @enderror"
                                    required>
                                <option value="">Seleccione</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                            </select>
                            <label for="rh">RH</label>
                        </div>

                        <!-- Password -->
                        <div class="form-floating mb-3">
                            <input type="password"
                                   name="password"
                                   id="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   placeholder="Contraseña"
                                   required>
                            <label for="password">Contraseña</label>
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-floating mb-3">
                            <input type="password"
                                   name="password_confirmation"
                                   id="password_confirmation"
                                   class="form-control"
                                   placeholder="Confirmar contraseña"
                                   required>
                            <label for="password_confirmation">Confirmar contraseña</label>
                        </div>

                        <!-- Rol oculto -->
                        <input type="hidden" name="role_id" value="2">

                        <!-- Botón principal -->
                        <button class="btn btn-primary w-100 py-2 fw-semibold">
                            Registrarse
                        </button>

                    </form>

                    <!-- Divider -->
                    <div class="d-flex align-items-center my-3">
                        <hr class="flex-grow-1">
                        <span class="mx-2 text-muted small">o</span>
                        <hr class="flex-grow-1">
                    </div>

                    <!-- Ir a login -->
                    <div class="d-grid">
                        <a href="{{ route('login') }}" 
                           class="btn btn-outline-secondary py-2">
                            Ya tengo cuenta
                        </a>
                    </div>

                </div>
            </div>

            <!-- Footer -->
             <p class="text-center text-muted small mt-4">
                © {{ date('Y') }} Clínica Areandina. Todos los derechos reservados.
            </p>

        </div>

    </div>
</div>

@endsection