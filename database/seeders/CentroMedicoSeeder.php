<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CentroMedico;

class CentroMedicoSeeder extends Seeder
{
    public function run(): void
    {
        CentroMedico::create([
            'nombre' => 'Clínica Central',
            'direccion' => 'Calle 10 #20-30',
            'telefono' => '6011234567'
        ]);

        CentroMedico::create([
            'nombre' => 'Sede Norte',
            'direccion' => 'Carrera 15 #80-20',
            'telefono' => '6017654321'
        ]);
    }
}