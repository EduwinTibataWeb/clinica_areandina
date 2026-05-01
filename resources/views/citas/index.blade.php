@extends('layouts.app')

@section('content')

<style>
    .btn-clinic {
        background-color: #022e63;
        color: white;
        border: none;
    }

    .btn-clinic:hover {
        background-color: #0353a4;
        color: white;
    }

    .table-modern th {
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #6c757d;
    }

    .table-modern td {
        vertical-align: middle;
    }

    .badge-status {
        padding: 6px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 500;
    }

    .status-pendiente {
        background-color: #fff3cd;
        color: #856404;
    }

    .status-confirmada {
        background-color: #d1e7dd;
        color: #0f5132;
    }

    .status-cancelada {
        background-color: #f8d7da;
        color: #842029;
    }

    .action-btns .btn {
        padding: 4px 8px;
    }
</style>

<div class="container py-4">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="fw-bold mb-1">Citas Médicas</h4>
            <p class="text-muted small mb-0">
                Gestión y control de citas del sistema
            </p>
        </div>

        <a href="{{ route('citas.create') }}" class="btn btn-clinic px-4">
            + Nueva Cita
        </a>

    </div>

    <!-- ALERT -->
    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <!-- CARD -->
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 table-modern">

                    <thead class="bg-light">
                        <tr>
                            <th>#</th>
                            <th>Paciente</th>
                            <th>Médico</th>
                            <th>Tipo</th>
                            <th>Centro</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Estado</th>
                            <th class="text-end pe-4">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($citas as $cita)

                            <tr>

                                <td class="fw-semibold">{{ $cita->id }}</td>

                                <td>{{ $cita->user->name }}</td>

                                <td>{{ $cita->medico->nombre }}</td>

                                <td>{{ $cita->tipoCita->nombre }}</td>

                                <td>{{ $cita->centroMedico->nombre }}</td>

                                <td>{{ $cita->fecha }}</td>

                                <td>{{ $cita->hora }}</td>

                                <td>
                                    @php
                                        $estadoClass = match(strtolower($cita->estado)) {
                                            'pendiente' => 'status-pendiente',
                                            'confirmada' => 'status-confirmada',
                                            'cancelada' => 'status-cancelada',
                                            default => 'bg-secondary text-white'
                                        };
                                    @endphp

                                    <span class="badge-status {{ $estadoClass }}">
                                        {{ ucfirst($cita->estado) }}
                                    </span>
                                </td>

                                <td class="text-end pe-4 action-btns">

                                    <a href="{{ route('citas.show', $cita) }}"
                                       class="btn btn-light btn-sm"
                                       title="Ver">
                                        👁️
                                    </a>

                                    <a href="{{ route('citas.edit', $cita) }}"
                                       class="btn btn-light btn-sm"
                                       title="Editar">
                                        ✏️
                                    </a>

                                    <form action="{{ route('citas.destroy', $cita) }}"
                                          method="POST"
                                          class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-light btn-sm text-danger"
                                                title="Eliminar"
                                                onclick="return confirm('¿Eliminar esta cita?')">
                                            🗑️
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="9" class="text-center py-5 text-muted">
                                    No hay citas registradas
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>
            </div>

        </div>

    </div>

    <!-- PAGINACIÓN -->
    <div class="mt-4">
        {{ $citas->links() }}
    </div>

</div>

@endsection