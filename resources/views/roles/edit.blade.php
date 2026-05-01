@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="card border-0 shadow rounded-4">

        <div class="card-body p-5">

            <h2 class="fw-bold mb-4">
                Editar Rol
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

            <form action="{{ route('roles.update', $role) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="mb-4">

                    <label class="form-label">
                        Nombre del Rol
                    </label>

                    <input
                        type="text"
                        name="nombre"
                        value="{{ $role->nombre }}"
                        class="form-control"
                        required
                    >

                </div>

                <button class="btn btn-success">
                    Actualizar
                </button>

                <a href="{{ route('roles.index') }}"
                   class="btn btn-secondary">

                    Volver
                </a>

            </form>

        </div>

    </div>

</div>

@endsection