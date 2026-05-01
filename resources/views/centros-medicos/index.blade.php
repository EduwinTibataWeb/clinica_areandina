@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1 class="fw-bold">
            Centros Médicos
        </h1>

        <a href="{{ route('centros-medicos.create') }}"
           class="btn btn-info text-white">

            Nuevo Centro Médico
        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif

    <div class="card border-0 shadow rounded-4">

        <div class="card-body">

            <table class="table table-hover align-middle">

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th width="250">Acciones</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($centros as $centro)

                        <tr>

                            <td>{{ $centro->id }}</td>

                            <td>{{ $centro->nombre }}</td>

                            <td>{{ $centro->direccion }}</td>

                            <td>{{ $centro->telefono }}</td>

                            <td>

                                <a href="{{ route('centros-medicos.show', $centro) }}"
                                   class="btn btn-info btn-sm text-white">

                                    Ver
                                </a>

                                <a href="{{ route('centros-medicos.edit', $centro) }}"
                                   class="btn btn-warning btn-sm text-white">

                                    Editar
                                </a>

                                <form
                                    action="{{ route('centros-medicos.destroy', $centro) }}"
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

                            <td colspan="5">
                                No hay centros médicos registrados
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

            <div class="mt-4">

                {{ $centros->links() }}

            </div>

        </div>

    </div>

</div>

@endsection