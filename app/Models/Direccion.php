<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    use HasFactory;

    protected $fillable = [ 'user_id', 'nombres', 'apellidos', 'nombre_empresa', 'direccion', 'documento', 'email', 'telefono', 'ciudad_id', 'comentario', 'tipo' ];


    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class);
    }
}
