<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $fillable = [
        'user_id',
        'medico_id',
        'tipo_cita_id',
        'centro_medico_id',
        'fecha',
        'hora',
        'estado'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function medico()
    {
        return $this->belongsTo(Medico::class);
    }

    public function tipoCita()
    {
        return $this->belongsTo(TipoCita::class);
    }

    public function centroMedico()
    {
        return $this->belongsTo(CentroMedico::class);
    }
}