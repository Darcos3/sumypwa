<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = [ 'nombre', 'slug', 'categoria_id', 'activa', 'imagen', 'destacada' ];

    public function parent()
    {
        return $this->belongsTo(Categoria::class,'categoria_id');
    }

    public function subcategorias()
    {
        return $this->hasMany(Categoria::class);
    }

    public function productos()
    {
        return $this->belongsToMany(Producto::class);
    }

    public static function generarUrl($categoria, $url = '')
    {
        if ($categoria->categoria_id != null) {
            return self::generarUrl($categoria->parent, $categoria->slug.'/'.$url);
        } else {
            $url = $categoria->slug.'/'.$url;
            return $url;
        }
    }

    public static function buscarId($categoria,$categorias)
    {
        foreach ($categorias as $categoriaSlug) {
            $categoria = $categoria->subcategorias->where('slug',$categoriaSlug)->first();
            if (!$categoria) {
                abort(404);
            }
        }
        return $categoria->id;
    }

    public static function principales()
    {
        return Categoria::where('id', '>',1)->where('categoria_id', null)->get();
    }

    public static function destacadas()
    {
        return Categoria::where('id', '>',1)->where('categoria_id', null)->where('destacada', 1)->get();
    }
}
