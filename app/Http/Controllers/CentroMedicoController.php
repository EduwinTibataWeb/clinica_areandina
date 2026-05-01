<?php

namespace App\Http\Controllers;

use App\Models\CentroMedico;
use Illuminate\Http\Request;

class CentroMedicoController extends Controller
{
    public function index()
    {
        $centros = CentroMedico::latest()->paginate(10);

        return view('centros-medicos.index', compact('centros'));
    }

    public function create()
    {
        return view('centros-medicos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
        ]);

        CentroMedico::create($validated);

        return redirect()
            ->route('centros-medicos.index')
            ->with('success', 'Centro médico creado correctamente.');
    }

    public function show(CentroMedico $centros_medico)
    {
        return view('centros-medicos.show', [
            'centro' => $centros_medico
        ]);
    }

    public function edit(CentroMedico $centros_medico)
    {
        return view('centros-medicos.edit', [
            'centro' => $centros_medico
        ]);
    }

    public function update(Request $request, CentroMedico $centros_medico)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
        ]);

        $centros_medico->update($validated);

        return redirect()
            ->route('centros-medicos.index')
            ->with('success', 'Centro médico actualizado correctamente.');
    }

    public function destroy(CentroMedico $centros_medico)
    {
        $centros_medico->delete();

        return redirect()
            ->route('centros-medicos.index')
            ->with('success', 'Centro médico eliminado correctamente.');
    }
}