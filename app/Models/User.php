<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'apellidos',
        'celular',
        'email',
        'password',
        'cedula',
        'birthday',
        'id_ciudad',
        'direccion',
        'identificador',
        'rol_id',
        'forma_pago',
        'estado',
        'rol_user'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function productos()
    // {
    //     return $this->belongsToMany(Producto::class);
    // }

    public function productos()
    {
        return $this->morphedByMany(Producto::class, 'favorito');
    }

    public function combos()
    {
        return $this->morphedByMany(Combo::class, 'favorito');
    }

    public function carrito()
    {
        return $this->hasOne(Carrito::class);
        // return $this->belongsToMany(Producto::class, 'carrito')->withPivot('cantidad');
    }

    public function pedidos()
    {
        return $this->hasMany(Pedido::class);
    }

    public function direcciones()
    {
        return $this->hasMany(Direccion::class);
    }

    public function ferretero()
    {
        return $this->hasOne(Ferretero::class);
    }

    public static function carritoTotal()
    {
        if (auth()->check()) {
            return ['cantidad' => auth()->user()->carrito->productos->count() + auth()->user()->carrito->combos->count(), 'total' => auth()->user()->carrito->total];
        }

        return ['cantidad' => 0, 'total' => 0];
    }
}
