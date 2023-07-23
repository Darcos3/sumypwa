<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;

// use Laravel\Scout\Searchable;

use Illuminate\Support\Facades\Log;

class Producto extends Model
{
    // use Searchable;
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'nombre',
        'slug',
        'descripcion',
        'precio',
        'precio_descuento',
        'precio_ferretero',
        'activo',
        'destacado',
        'categoria_id',
        'descripcion_corta',
        'sku',
        'cantidad',
        'imagen',
        'especificaciones',
        'ancho',
        'alto',
        'largo',
        'peso',
        'nuevo',
        'nuevo_vencimiento',
        'facturar_sinexistencias'
    ];

    // protected $with = ['terminos'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nombre'
            ]
        ];
    }

    // public function toSearchableArray()
    // {
    //     $array = $this->toArray();

    //     $array['terminos'] = $this->terminos->map(function ($data) {
    //         return $data['id'];
    //     })->toArray();

    //     return $array;
    // }

    public function imagenes()
    {
        return $this->hasMany(ImagenProducto::class);
    }

    public function carritos()
    {
        return $this->morphToMany(Carrito::class, 'encarrito')->withPivot('cantidad');
    }

    // public function carrito()
    // {
    //     return $this->belongsToMany(Carrito::class)->withPivot('cantidad');
    // }

    public function pedidos()
    {
        return $this->morphToMany(Pedido::class, 'enpedido')->withPivot('cantidad', 'precio');
    }

    // public function pedido()
    // {
    //     return $this->belongsToMany(Pedido::class)->withPivot('cantidad', 'precio');
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

    public function combos()
    {
        return $this->belongsToMany(Combo::class);
    }

    public function terminos()
    {
        return $this->belongsToMany(Termino::class);
    }

    // public function usuarios()
    // {
    //     return $this->belongsToMany(Usuario::class);
    // }

    public function favoritos()
    {
        return $this->morphToMany(User::class, 'favorito');
    }

    public static function destacados()
    {
        return Producto::where('destacado',1)->inRandomOrder()->limit(5)->get();
    }

    public function tieneDescuento()
    {
        if ($this->precio_descuento || $this->precio_ferretero) {
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

    public static function masValorados()
    {
        return Producto::orderBy('valoracion', 'desc')->limit(5)->get();
    }

    public function scopePrecio($query, $minimo, $maximo)
    {
        return $query->where('precio','<', $maximo)->where('precio','>',$minimo);
    }

    public function scopePrecioDescuentoAndFerretero($query, $minimo, $maximo)
    {
        return $query
            // ->where('precio','<', $maximo)
            // ->where('precio','>',$minimo)
            ->wherebetween('precio', [$minimo, $maximo])
            ->orwhere('precio_descuento', '<', $maximo)
            ;

    }

    public function scopeTieneTermino($query, $terminos)
    {
        // $query->with('terminos');
        \Debugbar::info('inicia');
        \Debugbar::info($terminos);
        \Debugbar::info('termina');
        if (empty($terminos)) {
            return $query;
        }

        return $query->whereIn('terminos',$terminos);
    }
}
