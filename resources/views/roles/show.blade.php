@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="card border-0 shadow rounded-4">

        <div class="card-body p-5">

            <h2 class="fw-bold mb-4">
                Detalle del Rol
            </h2>

            <table class="table">

                <tr>
                    <th>ID</th>
                    <td>{{ $role->id }}</td>
                </tr>

                <tr>
                    <th>Nombre</th>
                    <td>{{ $role->nombre }}</td>
                </tr>

            </table>

            <a href="{{ route('roles.index') }}"
               class="btn btn-secondary">

                Volver
            </a>

        </div>

    </div>

</div>

@endsection