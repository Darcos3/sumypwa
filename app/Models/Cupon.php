<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cupon extends Model
{
    use HasFactory;

    protected $fillable = [ 'nombre', 'codigo', 'cantidad', 'usos', 'vencimiento', 'descuento_dinero', 'descuento_porcentaje', 'estado', 'dtopesos', 'dtoporcentaje' ];

}
