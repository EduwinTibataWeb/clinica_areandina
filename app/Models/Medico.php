<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    protected $fillable = [
        'nombre',
        'especialidad',
        'email',
        'telefono'
    ];

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }
}