<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\User;
use App\Models\Medico;
use App\Models\TipoCita;
use App\Models\CentroMedico;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    public function index()
    {
        // ADMINISTRADOR
        if (auth()->user()->role_id == 1) {

            $citas = Cita::with([
                'user',
                'medico',
                'tipoCita',
                'centroMedico'
            ])
            ->latest()
            ->paginate(10);

        }

        // PACIENTE
        else {

            $citas = Cita::with([
                'user',
                'medico',
                'tipoCita',
                'centroMedico'
            ])
            ->where('user_id', auth()->id())
            ->latest()
            ->paginate(10);

        }

        return view('citas.index', compact('citas'));
    }

    public function create()
    {
        // ADMIN
        if (auth()->user()->role_id == 1) {

            $pacientes = User::all();

        }

        // PACIENTE
        else {

            $pacientes = User::where('id', auth()->id())->get();

        }

        $medicos = Medico::all();

        $tipos = TipoCita::all();

        $centros = CentroMedico::all();

        return view('citas.create', compact(
            'pacientes',
            'medicos',
            'tipos',
            'centros'
        ));
    }

    public function store(Request $request)
    {
        // ADMIN
        if (auth()->user()->role_id == 1) {

            $validated = $request->validate([

                'user_id' => 'required|exists:users,id',

                'medico_id' => 'required|exists:medicos,id',

                'tipo_cita_id' => 'required|exists:tipo_citas,id',

                'centro_medico_id' => 'required|exists:centro_medicos,id',

                'fecha' => 'required|date',

                'hora' => 'required',

                'estado' => 'required|string|max:50',

            ]);

        }

        // PACIENTE
        else {

            $validated = $request->validate([

                'medico_id' => 'required|exists:medicos,id',

                'tipo_cita_id' => 'required|exists:tipo_citas,id',

                'centro_medico_id' => 'required|exists:centro_medicos,id',

                'fecha' => 'required|date',

                'hora' => 'required',

                'estado' => 'required|string|max:50',

            ]);

            // FORZAR USER LOGUEADO
            $validated['user_id'] = auth()->id();

        }

        Cita::create($validated);

        return redirect()
            ->route('citas.index')
            ->with('success', 'Cita creada correctamente.');
    }

    public function show(Cita $cita)
    {
        // SI ES PACIENTE Y LA CITA NO ES SUYA
        if (
            auth()->user()->role_id != 1
            &&
            $cita->user_id != auth()->id()
        ) {

            abort(403);

        }

        return view('citas.show', compact('cita'));
    }

    public function edit(Cita $cita)
    {
        // SI ES PACIENTE Y LA CITA NO ES SUYA
        if (
            auth()->user()->role_id != 1
            &&
            $cita->user_id != auth()->id()
        ) {

            abort(403);

        }

        // ADMIN
        if (auth()->user()->role_id == 1) {

            $pacientes = User::all();

        }

        // PACIENTE
        else {

            $pacientes = User::where('id', auth()->id())->get();

        }

        $medicos = Medico::all();

        $tipos = TipoCita::all();

        $centros = CentroMedico::all();

        return view('citas.edit', compact(
            'cita',
            'pacientes',
            'medicos',
            'tipos',
            'centros'
        ));
    }

    public function update(Request $request, Cita $cita)
    {
        // SI ES PACIENTE Y LA CITA NO ES SUYA
        if (
            auth()->user()->role_id != 1
            &&
            $cita->user_id != auth()->id()
        ) {

            abort(403);

        }

        // ADMIN
        if (auth()->user()->role_id == 1) {

            $validated = $request->validate([

                'user_id' => 'required|exists:users,id',

                'medico_id' => 'required|exists:medicos,id',

                'tipo_cita_id' => 'required|exists:tipo_citas,id',

                'centro_medico_id' => 'required|exists:centro_medicos,id',

                'fecha' => 'required|date',

                'hora' => 'required',

                'estado' => 'required|string|max:50',

            ]);

        }

        // PACIENTE
        else {

            $validated = $request->validate([

                'medico_id' => 'required|exists:medicos,id',

                'tipo_cita_id' => 'required|exists:tipo_citas,id',

                'centro_medico_id' => 'required|exists:centro_medicos,id',

                'fecha' => 'required|date',

                'hora' => 'required',

                'estado' => 'required|string|max:50',

            ]);

            // FORZAR USER LOGUEADO
            $validated['user_id'] = auth()->id();

        }

        $cita->update($validated);

        return redirect()
            ->route('citas.index')
            ->with('success', 'Cita actualizada correctamente.');
    }

    public function destroy(Cita $cita)
    {
        // SI ES PACIENTE Y LA CITA NO ES SUYA
        if (
            auth()->user()->role_id != 1
            &&
            $cita->user_id != auth()->id()
        ) {

            abort(403);

        }

        $cita->delete();

        return redirect()
            ->route('citas.index')
            ->with('success', 'Cita eliminada correctamente.');
    }
}