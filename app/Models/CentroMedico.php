<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CentroMedico extends Model
{
    protected $fillable = [
        'nombre',
        'direccion',
        'telefono'
    ];

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }
}