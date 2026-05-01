@extends('layouts.app')

@section('content')

<style>
    .dashboard-header {
        background: linear-gradient(135deg, #022e63, #0353a4);
        color: white;
        border-radius: 16px;
    }

    .card-module {
        transition: all 0.25s ease;
        cursor: pointer;
    }

    .card-module:hover {
        transform: translateY(-6px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
    }

    .icon-box {
        width: 55px;
        height: 55px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        margin-bottom: 15px;
    }

    .btn-clinic {
        color: #022e63;
        font-weight: 600;
        transition: all 0.2s ease;
    }

    .card-module:hover .btn-clinic {
        transform: translateX(5px);
        color: #0353a4;
    }
</style>

<div class="container py-4">

    {{-- HEADER --}}
    <div class="dashboard-header p-4 p-md-5 mb-4 shadow-sm">

        <h2 class="fw-bold mb-2">

            @if(Auth::user()->role_id == 1)

                Panel Administrativo

            @else

                Panel del Paciente

            @endif

        </h2>

        <p class="mb-0 opacity-75">

            @if(Auth::user()->role_id == 1)

                Gestión de pacientes, médicos y citas médicas

            @else

                Consulta y gestión de citas médicas

            @endif

        </p>

    </div>

    <div class="row g-4">
        @if(Auth::user()->role_id == 1)

            {{-- PACIENTES --}}
            <div class="col-md-4">

                <a href="{{ route('pacientes.index') }}"
                   class="text-decoration-none">

                    <div class="card border-0 shadow-sm rounded-4 h-100 card-module">

                        <div class="card-body p-4">

                            <div class="icon-box bg-primary bg-opacity-10 text-primary">
                                👤
                            </div>

                            <h5 class="fw-bold text-dark">
                                Pacientes
                            </h5>

                            <p class="text-muted small mb-3">
                                Administración de pacientes registrados
                            </p>

                            <span class="btn-clinic">
                                Gestionar →
                            </span>

                        </div>

                    </div>

                </a>

            </div>

            {{-- MEDICOS --}}
            <div class="col-md-4">

                <a href="{{ route('medicos.index') }}"
                   class="text-decoration-none">

                    <div class="card border-0 shadow-sm rounded-4 h-100 card-module">

                        <div class="card-body p-4">

                            <div class="icon-box bg-success bg-opacity-10 text-success">
                                🩺
                            </div>

                            <h5 class="fw-bold text-dark">
                                Médicos
                            </h5>

                            <p class="text-muted small mb-3">
                                Gestión de médicos y especialidades
                            </p>

                            <span class="btn-clinic">
                                Gestionar →
                            </span>

                        </div>

                    </div>

                </a>

            </div>

            {{-- TIPOS DE CITA --}}
            <div class="col-md-4">

                <a href="{{ route('tipos-cita.index') }}"
                   class="text-decoration-none">

                    <div class="card border-0 shadow-sm rounded-4 h-100 card-module">

                        <div class="card-body p-4">

                            <div class="icon-box bg-warning bg-opacity-10 text-warning">
                                🧾
                            </div>

                            <h5 class="fw-bold text-dark">
                                Tipos de Cita
                            </h5>

                            <p class="text-muted small mb-3">
                                Configuración de servicios médicos
                            </p>

                            <span class="btn-clinic">
                                Gestionar →
                            </span>

                        </div>

                    </div>

                </a>

            </div>

            {{-- CENTROS --}}
            <div class="col-md-4">

                <a href="{{ route('centros-medicos.index') }}"
                   class="text-decoration-none">

                    <div class="card border-0 shadow-sm rounded-4 h-100 card-module">

                        <div class="card-body p-4">

                            <div class="icon-box bg-info bg-opacity-10 text-info">
                                🏥
                            </div>

                            <h5 class="fw-bold text-dark">
                                Centros Médicos
                            </h5>

                            <p class="text-muted small mb-3">
                                Administración de sedes médicas
                            </p>

                            <span class="btn-clinic">
                                Gestionar →
                            </span>

                        </div>

                    </div>

                </a>

            </div>

            {{-- ROLES --}}
            <div class="col-md-4">

                <a href="{{ route('roles.index') }}"
                   class="text-decoration-none">

                    <div class="card border-0 shadow-sm rounded-4 h-100 card-module">

                        <div class="card-body p-4">

                            <div class="icon-box bg-dark bg-opacity-10 text-dark">
                                🔐
                            </div>

                            <h5 class="fw-bold text-dark">
                                Roles
                            </h5>

                            <p class="text-muted small mb-3">
                                Gestión de permisos del sistema
                            </p>

                            <span class="btn-clinic">
                                Gestionar →
                            </span>

                        </div>

                    </div>

                </a>

            </div>

        @endif

        <div class="col-md-4">

            <a href="{{ route('citas.index') }}"
               class="text-decoration-none">

                <div class="card border-0 shadow-sm rounded-4 h-100 card-module">

                    <div class="card-body p-4">

                        <div class="icon-box bg-danger bg-opacity-10 text-danger">
                            📅
                        </div>

                        <h5 class="fw-bold text-dark">
                            Citas
                        </h5>

                        <p class="text-muted small mb-3">
                            Programación y control de citas médicas
                        </p>

                        <span class="btn-clinic">
                            Gestionar →
                        </span>

                    </div>

                </div>

            </a>

        </div>

    </div>

</div>

@endsection