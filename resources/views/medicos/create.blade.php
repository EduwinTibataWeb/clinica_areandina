@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="card border-0 shadow rounded-4">

        <div class="card-body p-5">

            <h2 class="fw-bold mb-4">
                Crear Médico
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

            <form action="{{ route('medicos.store') }}"
                  method="POST">

                @csrf

                <div class="mb-4">

                    <label class="form-label">
                        Nombre
                    </label>

                    <input
                        type="text"
                        name="nombre"
                        class="form-control"
                        required
                    >

                </div>

                <div class="mb-4">

                    <label class="form-label">
                        Especialidad
                    </label>

                    <input
                        type="text"
                        name="especialidad"
                        class="form-control"
                        required
                    >

                </div>

                <div class="mb-4">

                    <label class="form-label">
                        Email
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
                        Teléfono
                    </label>

                    <input
                        type="text"
                        name="telefono"
                        class="form-control"
                        required
                    >

                </div>

                <button class="btn btn-success">
                    Guardar
                </button>

                <a href="{{ route('medicos.index') }}"
                   class="btn btn-secondary">

                    Volver
                </a>

            </form>

        </div>

    </div>

</div>

@endsection