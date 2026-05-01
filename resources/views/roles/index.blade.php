@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1 class="fw-bold">
            Roles
        </h1>

        <a href="{{ route('roles.create') }}"
           class="btn btn-dark">

            Nuevo Rol
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
                        <th width="250">Acciones</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($roles as $role)

                        <tr>

                            <td>{{ $role->id }}</td>

                            <td>{{ $role->nombre }}</td>

                            <td>

                                <a href="{{ route('roles.show', $role) }}"
                                   class="btn btn-info btn-sm text-white">

                                    Ver
                                </a>

                                <a href="{{ route('roles.edit', $role) }}"
                                   class="btn btn-warning btn-sm text-white">

                                    Editar
                                </a>

                                <form
                                    action="{{ route('roles.destroy', $role) }}"
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
                                No hay roles registrados
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

            <div class="mt-4">

                {{ $roles->links() }}

            </div>

        </div>

    </div>

</div>

@endsection