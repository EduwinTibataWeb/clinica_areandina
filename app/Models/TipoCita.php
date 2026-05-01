<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoCita extends Model
{
    protected $fillable = [
        'nombre'
    ];

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }
}