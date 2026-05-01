@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="card border-0 shadow rounded-4">

        <div class="card-body p-5">

            <h2 class="fw-bold mb-4">
                Detalle del Paciente
            </h2>

            <table class="table">

                <tr>
                    <th>ID</th>
                    <td>{{ $paciente->id }}</td>
                </tr>

                <tr>
                    <th>Nombre</th>
                    <td>{{ $paciente->name }}</td>
                </tr>

                <tr>
                    <th>Email</th>
                    <td>{{ $paciente->email }}</td>
                </tr>

                <tr>
                    <th>Cédula</th>
                    <td>{{ $paciente->cedula }}</td>
                </tr>

                <tr>
                    <th>Fecha de Nacimiento</th>
                    <td>{{ $paciente->fecha_nacimiento }}</td>
                </tr>

                <tr>
                    <th>RH</th>
                    <td>{{ $paciente->rh }}</td>
                </tr>

            </table>

            <a href="{{ route('pacientes.index') }}"
               class="btn btn-secondary">

                Volver
            </a>

        </div>

    </div>

</div>

@endsection