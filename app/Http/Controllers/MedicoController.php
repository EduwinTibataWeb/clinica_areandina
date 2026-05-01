<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    public function index()
    {
        $medicos = Medico::latest()->paginate(10);

        return view('medicos.index', compact('medicos'));
    }

    public function create()
    {
        return view('medicos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'especialidad' => 'required|string|max:255',
            'email' => 'required|email|unique:medicos,email',
            'telefono' => 'required|string|max:20',
        ]);

        Medico::create($validated);

        return redirect()
            ->route('medicos.index')
            ->with('success', 'Médico creado correctamente.');
    }

    public function show(Medico $medico)
    {
        return view('medicos.show', compact('medico'));
    }

    public function edit(Medico $medico)
    {
        return view('medicos.edit', compact('medico'));
    }

    public function update(Request $request, Medico $medico)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'especialidad' => 'required|string|max:255',
            'email' => 'required|email|unique:medicos,email,' . $medico->id,
            'telefono' => 'required|string|max:20',
        ]);

        $medico->update($validated);

        return redirect()
            ->route('medicos.index')
            ->with('success', 'Médico actualizado correctamente.');
    }

    public function destroy(Medico $medico)
    {
        $medico->delete();

        return redirect()
            ->route('medicos.index')
            ->with('success', 'Médico eliminado correctamente.');
    }
}