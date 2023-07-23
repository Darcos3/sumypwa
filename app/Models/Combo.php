<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use Laravel\Scout\Searchable;

class Combo extends Model
{
    // use Searchable;
    use HasFactory;

    protected $fillable = [
        'nombre',
        'slug',
        'sku',
        'descripcion_corta',
        'descripcion',
        'especificaciones',
        'precio',
        'precio_descuento',
        'precio_ferretero',
        'vendidos',
        'activo',
        'categoria_id',
        'imagen',
        'valoracion'
    ];

    // public function toSearchableArray()
    // {
    //     $array = $this->toArray();

    //     $array['productos'] = $this->productos->map(function ($data) {
    //         return $data['nombre'];
    //     })->toArray();

    //     return $array;
    // }

    public function carritos()
    {
        return $this->morphToMany(Carrito::class, 'encarrito')->withPivot('cantidad');
    }

    // public function carrito()
    // {
    //     return $this->belongsToMany(Carrito::class)->withPivot('cantidad');
    // }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }


    public function categorias()
    {
        return $this->belongsToMany(Categoria::class);
    }

    public function etiquetas()
    {
        return $this->belongsToMany(Etiqueta::class);
    }

    public function favoritos()
    {
        return $this->morphToMany(User::class, 'favorito');
    }

    public function productos()
    {
        return $this->belongsToMany(Producto::class);
    }

    public function pedidos()
    {
        return $this->morphToMany(Pedido::class, 'enpedido')->withPivot('cantidad', 'precio');
    }

    // public function pedido()
    // {
    //     return $this->belongsToMany(Pedido::class)->withPivot('cantidad', 'precio');
    // }

    public function tieneDescuento()
    {
        if ($this->precio_descuento || ($this->precio_ferretero && auth()->user()->rol_id == 3  )) {
            return true;
        }
        return false;
    }

    public function precioDescuento()
    {
        if (auth()->check()) {
            if (auth()->user()->rol_id == 3) {
                return $this->precio_ferretero ?? $this->precio_descuento;
            }
        }
        return $this->precio_descuento;
    }

    public function menorPrecio()
    {
        if (auth()->check()) {
            if (auth()->user()->rol_id == 3) {
                return $this->precio_ferretero ?? $this->precio_descuento;
            }
        }
        return $this->precio_descuento ?? $this->precio;
    }
}
