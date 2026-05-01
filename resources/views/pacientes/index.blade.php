@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1 class="fw-bold">
            Pacientes
        </h1>

        <a href="{{ route('pacientes.create') }}"
           class="btn btn-primary">

            Nuevo Paciente
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
                        <th>Email</th>
                        <th>Cédula</th>
                        <th>RH</th>
                        <th width="250">Acciones</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($pacientes as $paciente)

                        <tr>

                            <td>{{ $paciente->id }}</td>

                            <td>{{ $paciente->name }}</td>

                            <td>{{ $paciente->email }}</td>

                            <td>{{ $paciente->cedula }}</td>

                            <td>{{ $paciente->rh }}</td>

                            <td>

                                <a href="{{ route('pacientes.show', $paciente) }}"
                                   class="btn btn-info btn-sm text-white">

                                    Ver
                                </a>

                                <a href="{{ route('pacientes.edit', $paciente) }}"
                                   class="btn btn-warning btn-sm text-white">

                                    Editar
                                </a>

                                <form
                                    action="{{ route('pacientes.destroy', $paciente) }}"
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
                                No hay pacientes registrados
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

            <div class="mt-4">

                {{ $pacientes->links() }}

            </div>

        </div>

    </div>

</div>

@endsection