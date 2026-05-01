<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PacienteController extends Controller
{
    public function index()
    {
        $pacientes = User::whereHas('role', function ($query) {
            $query->where('nombre', 'Paciente');
        })->latest()->paginate(10);

        return view('pacientes.index', compact('pacientes'));
    }

    public function create()
    {
        return view('pacientes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'cedula' => 'required|string|max:20|unique:users,cedula',
            'fecha_nacimiento' => 'required|date',
            'rh' => 'required|string|max:5',
        ]);

        $rolePaciente = Role::where('nombre', 'Paciente')->first();

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'cedula' => $validated['cedula'],
            'fecha_nacimiento' => $validated['fecha_nacimiento'],
            'rh' => $validated['rh'],
            'role_id' => $rolePaciente->id
        ]);

        return redirect()
            ->route('pacientes.index')
            ->with('success', 'Paciente creado correctamente.');
    }

    public function show(User $paciente)
    {
        return view('pacientes.show', compact('paciente'));
    }

    public function edit(User $paciente)
    {
        return view('pacientes.edit', compact('paciente'));
    }

    public function update(Request $request, User $paciente)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $paciente->id,
            'cedula' => 'required|string|max:20|unique:users,cedula,' . $paciente->id,
            'fecha_nacimiento' => 'required|date',
            'rh' => 'required|string|max:5',
        ]);

        $paciente->update($validated);

        return redirect()
            ->route('pacientes.index')
            ->with('success', 'Paciente actualizado correctamente.');
    }

    public function destroy(User $paciente)
    {
        $paciente->delete();

        return redirect()
            ->route('pacientes.index')
            ->with('success', 'Paciente eliminado correctamente.');
    }
}