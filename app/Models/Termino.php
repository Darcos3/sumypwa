<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Termino extends Model
{   
    use HasFactory;

    protected $fillable = [ 'nombre', 'imagen', 'atributo_id', 'activo' ];

    public function atributo()
    {
        return $this->belongsTo(Atributo::class);
    }

    public function productos()
    {
        return $this->belongsToMany(Producto::class);
    }
}
