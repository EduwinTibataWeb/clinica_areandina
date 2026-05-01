@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="card border-0 shadow rounded-4">

        <div class="card-body p-5">

            <h2 class="fw-bold mb-4">
                Detalle del Médico
            </h2>

            <table class="table">

                <tr>
                    <th>ID</th>
                    <td>{{ $medico->id }}</td>
                </tr>

                <tr>
                    <th>Nombre</th>
                    <td>{{ $medico->nombre }}</td>
                </tr>

                <tr>
                    <th>Especialidad</th>
                    <td>{{ $medico->especialidad }}</td>
                </tr>

                <tr>
                    <th>Email</th>
                    <td>{{ $medico->email }}</td>
                </tr>

                <tr>
                    <th>Teléfono</th>
                    <td>{{ $medico->telefono }}</td>
                </tr>

            </table>

            <a href="{{ route('medicos.index') }}"
               class="btn btn-secondary">

                Volver
            </a>

        </div>

    </div>

</div>

@endsection