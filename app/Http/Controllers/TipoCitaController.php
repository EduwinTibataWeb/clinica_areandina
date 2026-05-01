<?php

namespace App\Http\Controllers;

use App\Models\TipoCita;
use Illuminate\Http\Request;

class TipoCitaController extends Controller
{
    public function index()
    {
        $tipos = TipoCita::latest()->get();

        return view('tipos-cita.index', compact('tipos'));
    }

    public function create()
    {
        return view('tipos-cita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255'
        ]);

        TipoCita::create($request->all());

        return redirect()
            ->route('tipos-cita.index')
            ->with('success', 'Tipo de cita creado correctamente');
    }

    public function edit(TipoCita $tipos_citum)
    {
        return view('tipos-cita.edit', [
            'tipo' => $tipos_citum
        ]);
    }

    public function update(Request $request, TipoCita $tipos_citum)
    {
        $request->validate([
            'nombre' => 'required|max:255'
        ]);

        $tipos_citum->update($request->all());

        return redirect()
            ->route('tipos-cita.index')
            ->with('success', 'Tipo de cita actualizado correctamente');
    }

    public function destroy(TipoCita $tipos_citum)
    {
        $tipos_citum->delete();

        return redirect()
            ->route('tipos-cita.index')
            ->with('success', 'Tipo de cita eliminado');
    }
}