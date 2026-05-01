@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="card border-0 shadow rounded-4">

        <div class="card-body p-5">

            <h2 class="fw-bold mb-4">
                Detalle de la Cita Médica
            </h2>

            <table class="table">

                <tr>
                    <th>ID</th>
                    <td>{{ $cita->id }}</td>
                </tr>

                <tr>
                    <th>Paciente</th>
                    <td>{{ $cita->user->name }}</td>
                </tr>

                <tr>
                    <th>Médico</th>
                    <td>{{ $cita->medico->nombre }}</td>
                </tr>

                <tr>
                    <th>Tipo de Cita</th>
                    <td>{{ $cita->tipoCita->nombre }}</td>
                </tr>

                <tr>
                    <th>Centro Médico</th>
                    <td>{{ $cita->centroMedico->nombre }}</td>
                </tr>

                <tr>
                    <th>Fecha</th>
                    <td>{{ $cita->fecha }}</td>
                </tr>

                <tr>
                    <th>Hora</th>
                    <td>{{ $cita->hora }}</td>
                </tr>

                <tr>
                    <th>Estado</th>
                    <td>

                        <span class="badge bg-primary">
                            {{ $cita->estado }}
                        </span>

                    </td>
                </tr>

            </table>

            <a href="{{ route('citas.index') }}"
               class="btn btn-secondary">

                Volver
            </a>

        </div>

    </div>

</div>

@endsection