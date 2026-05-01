@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="card border-0 shadow rounded-4">

        <div class="card-body p-5">

            <h2 class="fw-bold mb-4">
                Detalle del Centro Médico
            </h2>

            <table class="table">

                <tr>
                    <th>ID</th>
                    <td>{{ $centro->id }}</td>
                </tr>

                <tr>
                    <th>Nombre</th>
                    <td>{{ $centro->nombre }}</td>
                </tr>

                <tr>
                    <th>Dirección</th>
                    <td>{{ $centro->direccion }}</td>
                </tr>

                <tr>
                    <th>Teléfono</th>
                    <td>{{ $centro->telefono }}</td>
                </tr>

            </table>

            <a href="{{ route('centros-medicos.index') }}"
               class="btn btn-secondary">

                Volver
            </a>

        </div>

    </div>

</div>

@endsection