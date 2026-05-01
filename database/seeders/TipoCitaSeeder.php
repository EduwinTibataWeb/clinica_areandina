<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoCita;

class TipoCitaSeeder extends Seeder
{
    public function run(): void
    {
        $tipos = [
            'Medicina General',
            'Odontología',
            'Laboratorio',
            'Pediatría'
        ];

        foreach ($tipos as $tipo) {
            TipoCita::create([
                'nombre' => $tipo
            ]);
        }
    }
}