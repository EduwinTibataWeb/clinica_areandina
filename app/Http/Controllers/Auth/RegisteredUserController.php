<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([

            'name' => [
                'required',
                'string',
                'max:255'
            ],

            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                'unique:' . User::class
            ],

            'password' => [
                'required',
                'confirmed',
                Rules\Password::defaults()
            ],

            'cedula' => [
                'required',
                'string',
                'max:50',
                'unique:users'
            ],

            'fecha_nacimiento' => [
                'required',
                'date'
            ],

            'rh' => [
                'required',
                'string',
                'max:10'
            ],

            'role_id' => [
                'required',
                'exists:roles,id'
            ],

        ]);

        $user = User::create([

            'name' => $request->name,

            'email' => $request->email,

            'password' => Hash::make($request->password),

            'cedula' => $request->cedula,

            'fecha_nacimiento' => $request->fecha_nacimiento,

            'rh' => $request->rh,

            'role_id' => $request->role_id,

        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}