@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="card border-0 shadow rounded-4">

        <div class="card-body p-5">

            <h2 class="fw-bold mb-4">
                Editar Paciente
            </h2>

            @if($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            <form action="{{ route('pacientes.update', $paciente) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="mb-4">

                    <label class="form-label">
                        Nombre
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ $paciente->name }}"
                        class="form-control"
                        required
                    >

                </div>

                <div class="mb-4">

                    <label class="form-label">
                        Correo Electrónico
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ $paciente->email }}"
                        class="form-control"
                        required
                    >

                </div>

                <div class="mb-4">

                    <label class="form-label">
                        Cédula
                    </label>

                    <input
                        type="text"
                        name="cedula"
                        value="{{ $paciente->cedula }}"
                        class="form-control"
                        required
                    >

                </div>

                <div class="mb-4">

                    <label class="form-label">
                        Fecha de Nacimiento
                    </label>

                    <input
                        type="date"
                        name="fecha_nacimiento"
                        value="{{ \Carbon\Carbon::parse($paciente->fecha_nacimiento)->format('Y-m-d') }}"
                        class="form-control"
                        required
                    >

                </div>

                <div class="mb-4">

                    <label class="form-label">
                        RH
                    </label>

                    <select
                        name="rh"
                        class="form-select"
                        required
                    >

                        <option value="O+" {{ $paciente->rh == 'O+' ? 'selected' : '' }}>
                            O+
                        </option>

                        <option value="O-" {{ $paciente->rh == 'O-' ? 'selected' : '' }}>
                            O-
                        </option>

                        <option value="A+" {{ $paciente->rh == 'A+' ? 'selected' : '' }}>
                            A+
                        </option>

                        <option value="A-" {{ $paciente->rh == 'A-' ? 'selected' : '' }}>
                            A-
                        </option>

                        <option value="B+" {{ $paciente->rh == 'B+' ? 'selected' : '' }}>
                            B+
                        </option>

                        <option value="B-" {{ $paciente->rh == 'B-' ? 'selected' : '' }}>
                            B-
                        </option>

                        <option value="AB+" {{ $paciente->rh == 'AB+' ? 'selected' : '' }}>
                            AB+
                        </option>

                        <option value="AB-" {{ $paciente->rh == 'AB-' ? 'selected' : '' }}>
                            AB-
                        </option>

                    </select>

                </div>

                <button class="btn btn-success">
                    Actualizar
                </button>

                <a href="{{ route('pacientes.index') }}"
                   class="btn btn-secondary">

                    Volver
                </a>

            </form>

        </div>

    </div>

</div>

@endsection