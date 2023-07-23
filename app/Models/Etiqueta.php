<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etiqueta extends Model
{
    use HasFactory;

    protected $fillable = [ 'nombre', 'slug', 'imagen', 'activa' ];

    public function productos()
    {
        return $this->belongsToMany(Producto::class);
    }

    public function combos()
    {
        return $this->belongsToMany(Combo::class);
    }

    public static function novedades()
    {
        return Etiqueta::find(1)->productos()->inRandomOrder()->limit(5)->get();
    }

    public static function promociones()
    {
        return Etiqueta::find(2)->productos()->inRandomOrder()->limit(5)->get();
    }
}
