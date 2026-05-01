@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1 class="fw-bold">
            Médicos
        </h1>

        <a href="{{ route('medicos.create') }}"
           class="btn btn-success">

            Nuevo Médico
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
                        <th>Especialidad</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th width="250">Acciones</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($medicos as $medico)

                        <tr>

                            <td>{{ $medico->id }}</td>

                            <td>{{ $medico->nombre }}</td>

                            <td>{{ $medico->especialidad }}</td>

                            <td>{{ $medico->email }}</td>

                            <td>{{ $medico->telefono }}</td>

                            <td>

                                <a href="{{ route('medicos.show', $medico) }}"
                                   class="btn btn-info btn-sm text-white">

                                    Ver
                                </a>

                                <a href="{{ route('medicos.edit', $medico) }}"
                                   class="btn btn-warning btn-sm text-white">

                                    Editar
                                </a>

                                <form
                                    action="{{ route('medicos.destroy', $medico) }}"
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

                            <td colspan="6">
                                No hay médicos registrados
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

            <div class="mt-4">

                {{ $medicos->links() }}

            </div>

        </div>

    </div>

</div>

@endsection