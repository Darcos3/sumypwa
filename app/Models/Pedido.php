<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero',
        'wompi_id',
        'user_id',
        'estado_pedido_id',
        'cupon_descuento',
        'cupon_id',
        'total',
        'envio',
        'medio_transporte_id',
        'nombre',
        'apellido',
        'nombre_empresa',
        'numero_identificacion',
        'direccion',
        'direccion_adicional',
        'ciudad_id',
        'email',
        'telefono',
        'comentario',
        'nombre_envio',
        'apellido_envio',
        'nombre_empresa_envio',
        'numero_identificacion_envio',
        'direccion_envio',
        'direccion_adicional_envio',
        'ciudad_envio_id',
        'id_transportador',
        'email_envio',
        'telefono_envio',
        'estado_pago'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class);
    }

    public function ciudadEnvio()
    {
        return $this->belongsTo(Ciudad::class, 'ciudad_envio_id', 'departamento_id');
    }

    public function estadoPedido()
    {
        return $this->belongsTo(EstadoPedido::class);
    }

    public function medioTransporte()
    {
        return $this->belongsTo(MedioTransporte::class);
    }

    public function cupon()
    {
        return $this->belongsTo(Cupon::class);
    }

    // public function productos()
    // {
    //     return $this->belongsToMany(Producto::class)->withPivot('cantidad', 'precio');
    // }

    // public function combos()
    // {
    //     return $this->belongsToMany(Combo::class)->withPivot('cantidad', 'precio');
    // }

    public function productos()
    {
        return $this->morphedByMany(Producto::class, 'enpedido')->withPivot('cantidad', 'precio');
    }

    public function combos()
    {
        return $this->morphedByMany(Combo::class, 'enpedido')->withPivot('cantidad', 'precio');
    }

    public function transportador()
    {
        return $this->belongsTo(User::class, 'id_transportador', 'id');
    }

}
