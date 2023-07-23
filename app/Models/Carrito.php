<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    use HasFactory;

    protected $fillable = [ 'user_id', 'cupon_id', 'total' ];

    public function productos()
    {
        return $this->morphedByMany(Producto::class, 'encarrito')->withPivot('cantidad');
    }

    public function combos()
    {
        return $this->morphedByMany(Combo::class, 'encarrito')->withPivot('cantidad');
    }

    // public function productos()
    // {
    //     return $this->belongsToMany(Producto::class)->withPivot('cantidad');
    // }

    // public function combos()
    // {
    //     return $this->belongsToMany(Combo::class)->withPivot('cantidad');
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cupon()
    {
        return $this->belongsTo(Cupon::class);
    }

    public function actualizarTotalCarrito()
    {
        // TODO: cambiar por $this
        $total = 0;
        foreach (auth()->user()->carrito->productos as $prod) {
            $total += $prod->pivot->cantidad * ($prod->tieneDescuento() ? $prod->precioDescuento() : $prod->precio );
        }
        foreach (auth()->user()->carrito->combos as $comb) {
            $total += $comb->pivot->cantidad * ($comb->tieneDescuento() ? $comb->precioDescuento() : $comb->precio );
        }
        auth()->user()->carrito->total = $total;
        auth()->user()->carrito->save();
    }
}
