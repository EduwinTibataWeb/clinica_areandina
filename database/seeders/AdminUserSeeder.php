<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Eduwin Tibatá',
            'email' => 'admin@clinica.com',
            'password' => Hash::make('admin123'),
            'cedula' => '123456789',
            'fecha_nacimiento' => '2000-01-01',
            'rh' => 'O+',
            'role_id' => 1
        ]);

        User::create([
            'name' => 'Nancy Rincon Arrieta',
            'email' => 'nancy@clinica.com',
            'password' => Hash::make('nancy123'),
            'cedula' => '987654321',
            'fecha_nacimiento' => '1990-05-15',
            'rh' => 'A-',
            'role_id' => 2
        ]);

        User::create([
            'name' => ' Oscar Javier Sierra Mora',
            'email' => 'oscar@clinica.com',
            'password' => Hash::make('oscar123'),
            'cedula' => '987654321',
            'fecha_nacimiento' => '1999-08-19',
            'rh' => 'A-',
            'role_id' => 2
        ]);
    }
}