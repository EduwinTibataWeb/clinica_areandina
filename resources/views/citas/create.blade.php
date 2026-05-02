@extends('layouts.app')

@section('content')

<style>

    .card-clinic {
        border: none;
        border-radius: 22px;
        overflow: hidden;
    }

    .card-header-clinic {
        background: linear-gradient(135deg, #022e63, #0353a4);
        color: white;
    }

    .form-label {
        font-weight: 600;
        color: #022e63;
        margin-bottom: 8px;
    }

    .form-control,
    .form-select {
        border-radius: 12px;
        padding: 12px 14px;
        border: 1px solid #dbe4f0;
        transition: all 0.2s ease;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #0353a4;
        box-shadow: 0 0 0 0.15rem rgba(3, 83, 164, 0.15);
    }

    .btn-clinic {
        background-color: #022e63;
        color: white;
        border-radius: 12px;
        padding: 12px 22px;
        border: none;
        font-weight: 600;
        transition: all 0.2s ease;
    }

    .btn-clinic:hover {
        background-color: #0353a4;
        color: white;
        transform: translateY(-1px);
    }

    .btn-light-clinic {
        border-radius: 12px;
        padding: 12px 22px;
        font-weight: 600;
    }

    .section-title {
        font-size: 13px;
        letter-spacing: 1px;
        text-transform: uppercase;
        color: #6c757d;
        margin-bottom: 20px;
    }

</style>

<div class="container py-4">

    <div class="card shadow-sm card-clinic">

        {{-- HEADER --}}
        <div class="card-header card-header-clinic p-4">

            <div class="d-flex align-items-center justify-content-between">

                <div>

                    <h3 class="fw-bold mb-1">
                        Nueva Cita Médica
                    </h3>

                    <p class="mb-0 opacity-75">
                        Registro y programación de citas
                    </p>

                </div>

                <div style="font-size: 42px;">
                    📅
                </div>

            </div>

        </div>

        {{-- BODY --}}
        <div class="card-body p-4 p-md-5">

            {{-- ERRORES --}}
            @if($errors->any())

                <div class="alert alert-danger border-0 shadow-sm rounded-4">

                    <div class="fw-semibold mb-2">
                        Se encontraron errores:
                    </div>

                    <ul class="mb-0">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            <form action="{{ route('citas.store') }}"
                  method="POST">

                @csrf

                <div class="section-title">
                    Información de la Cita
                </div>

                <div class="row g-4">

                    {{-- PACIENTE --}}
                    @if(auth()->user()->role_id == 1)

                        <div class="col-md-6">

                            <label class="form-label">
                                Paciente
                            </label>

                            <select
                                name="user_id"
                                class="form-select"
                                required
                            >

                                <option value="">
                                    Seleccione un paciente
                                </option>

                                @foreach($pacientes as $paciente)

                                    <option value="{{ $paciente->id }}">

                                        {{ $paciente->name }}

                                    </option>

                                @endforeach

                            </select>

                        </div>

                    @else

                        <div class="col-md-6">

                            <label class="form-label">
                                Paciente
                            </label>

                            <input
                                type="text"
                                class="form-control bg-light"
                                value="{{ auth()->user()->name }}"
                                readonly
                            >

                        </div>

                    @endif

                    {{-- MEDICO --}}
                    <div class="col-md-6">

                        <label class="form-label">
                            Médico
                        </label>

                        <select
                            name="medico_id"
                            class="form-select"
                            required
                        >

                            <option value="">
                                Seleccione un médico
                            </option>

                            @foreach($medicos as $medico)

                                <option value="{{ $medico->id }}">

                                    {{ $medico->nombre }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    {{-- TIPO --}}
                    <div class="col-md-6">

                        <label class="form-label">
                            Tipo de Cita
                        </label>

                        <select
                            name="tipo_cita_id"
                            class="form-select"
                            required
                        >

                            <option value="">
                                Seleccione un tipo
                            </option>

                            @foreach($tipos as $tipo)

                                <option value="{{ $tipo->id }}">

                                    {{ $tipo->nombre }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    {{-- CENTRO --}}
                    <div class="col-md-6">

                        <label class="form-label">
                            Centro Médico
                        </label>

                        <select
                            name="centro_medico_id"
                            class="form-select"
                            required
                        >

                            <option value="">
                                Seleccione un centro
                            </option>

                            @foreach($centros as $centro)

                                <option value="{{ $centro->id }}">

                                    {{ $centro->nombre }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    {{-- FECHA --}}
                    <div class="col-md-6">

                        <label class="form-label">
                            Fecha
                        </label>

                        <input
                            type="date"
                            name="fecha"
                            class="form-control"
                            required
                        >

                    </div>

                    {{-- HORA --}}
                    <div class="col-md-6">

                        <label class="form-label">
                            Hora
                        </label>

                        <input
                            type="time"
                            name="hora"
                            class="form-control"
                            required
                        >

                    </div>

                    {{-- ESTADO --}}
                    <div class="col-md-6">

                        <label class="form-label">
                            Estado
                        </label>

                        <select
                            name="estado"
                            class="form-select"
                            required
                        >

                            <option value="">
                                Seleccione estado
                            </option>

                            <option value="pendiente">
                                Pendiente
                            </option>

                            <option value="completada">
                                Completada
                            </option>

                            <option value="cancelada">
                                Cancelada
                            </option>

                        </select>

                    </div>

                </div>

                {{-- BOTONES --}}
                <div class="d-flex gap-3 mt-5">

                    <button class="btn btn-clinic">

                        Guardar Cita

                    </button>

                    <a href="{{ route('citas.index') }}"
                       class="btn btn-light border btn-light-clinic">

                        Volver

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection