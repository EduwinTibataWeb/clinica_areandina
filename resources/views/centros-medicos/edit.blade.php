@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="card border-0 shadow rounded-4">

        <div class="card-body p-5">

            <h2 class="fw-bold mb-4">
                Editar Centro Médico
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

            <form action="{{ route('centros-medicos.update', $centro) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="mb-4">

                    <label class="form-label">
                        Nombre
                    </label>

                    <input
                        type="text"
                        name="nombre"
                        value="{{ $centro->nombre }}"
                        class="form-control"
                        required
                    >

                </div>

                <div class="mb-4">

                    <label class="form-label">
                        Dirección
                    </label>

                    <input
                        type="text"
                        name="direccion"
                        value="{{ $centro->direccion }}"
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
                        value="{{ $centro->telefono }}"
                        class="form-control"
                        required
                    >

                </div>

                <button class="btn btn-success">
                    Actualizar
                </button>

                <a href="{{ route('centros-medicos.index') }}"
                   class="btn btn-secondary">

                    Volver
                </a>

            </form>

        </div>

    </div>

</div>

@endsection