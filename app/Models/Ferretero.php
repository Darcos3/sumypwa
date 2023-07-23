<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ferretero extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nombre_ferreteria',
        'nit',
        'direccion',
        'numero_contacto',
        'email',
        'nombre_representante',
        'celular',
        'camara_comercio',
        'foto_cedula',
        'foto_rut',
        'cupo',
        'cupo_parcial',
        'estado_ferretero_id',
        'motivo_revision',
        'tiempo_credito'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function estadoFerretero()
    {
        return $this->belongsTo(EstadoFerretero::class);
    }
}
