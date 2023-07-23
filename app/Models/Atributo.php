<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atributo extends Model
{
    use HasFactory;

    protected $fillable = [ 'nombre', 'slug', 'activo' ];

    public function terminos()
    {
        return $this->hasMany(Termino::class);
    }

    public static function marcas()
    {
        return Atributo::with('terminos')->where('nombre', 'Marcas')->first();
    }
}
