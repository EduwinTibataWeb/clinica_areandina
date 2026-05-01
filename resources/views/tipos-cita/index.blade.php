@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1 class="fw-bold">
            Tipos de Cita
        </h1>

        <a href="{{ route('tipos-cita.create') }}"
           class="btn btn-primary">

            Nuevo Tipo
        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif

    <div class="card shadow border-0 rounded-4">

        <div class="card-body">

            <table class="table align-middle">

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th width="200">Acciones</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($tipos as $tipo)

                        <tr>

                            <td>
                                {{ $tipo->id }}
                            </td>

                            <td>
                                {{ $tipo->nombre }}
                            </td>

                            <td>

                                <a href="{{ route('tipos-cita.edit', $tipo) }}"
                                   class="btn btn-warning btn-sm text-white">

                                    Editar
                                </a>

                                <form
                                    action="{{ route('tipos-cita.destroy', $tipo) }}"
                                    method="POST"
                                    class="d-inline"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm">
                                        Eliminar
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="3">
                                No hay registros
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection