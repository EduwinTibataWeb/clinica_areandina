<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Medico;

class MedicoSeeder extends Seeder
{
    public function run(): void
    {
        Medico::create([
            'nombre' => 'Carlos Ramirez',
            'especialidad' => 'Medicina General',
            'email' => 'carlos@clinica.com',
            'telefono' => '3001112233'
        ]);

        Medico::create([
            'nombre' => 'Laura Martinez',
            'especialidad' => 'Odontología',
            'email' => 'laura@clinica.com',
            'telefono' => '3002223344'
        ]);
    }
}