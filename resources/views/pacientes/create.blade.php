@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="card border-0 shadow rounded-4">

        <div class="card-body p-5">

            <h2 class="fw-bold mb-4">
                Crear Paciente
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

            <form action="{{ route('pacientes.store') }}"
                  method="POST">

                @csrf

                <div class="mb-4">

                    <label class="form-label">
                        Nombre
                    </label>

                    <input
                        type="text"
                        name="name"
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
                        class="form-control"
                        required
                    >

                </div>

                <div class="mb-4">

                    <label class="form-label">
                        Contraseña
                    </label>

                    <input
                        type="password"
                        name="password"
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

                        <option value="">
                            Seleccione RH
                        </option>

                        <option value="O+">O+</option>
                        <option value="O-">O-</option>

                        <option value="A+">A+</option>
                        <option value="A-">A-</option>

                        <option value="B+">B+</option>
                        <option value="B-">B-</option>

                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>

                    </select>

                </div>

                <button class="btn btn-primary">
                    Guardar
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