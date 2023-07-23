<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class HomeController extends Controller
{
    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function index()
    {   
        $fecha_actual = strtotime(date("Y-m-d"));

        $cupones = \App\Models\Cupon::get();

        foreach ($cupones as $cupon) {
            
            if($cupon->nombre = 'Registro'){
                if(auth()->check()){
                    if(auth()->user()->rol_id == 2){
                        $fecharegistro = auth()->user()->created_at;
                        $fechavencimientocupon_registro = date("Y-m-d",strtotime($fecharegistro."+ 2 months"));;
                        
                        if(strtotime($fechavencimientocupon_registro) < $fecha_actual){
                            $cuponuser = \App\Models\CuponUsuario::create([
                                "id_user" => auth()->user()->id,
                                "id_cupon" => $cupon->id
                            ]);
                        }
                    }
                }
            }else {
                $fechavencimientocupon = strtotime($cupon->vencimiento);

                if( $fechavencimientocupon < $fecha_actual ){
                    $cupon->fill([
                        "estado" => 0
                    ]);
                    $cupon->save();
                }
            }
        }

        // $insuperables = \App\Models\Producto::where('activo',1)->get();
        // $posts = \App\Models\Producto::has('etiquetas', '=', 1)->get();
        $insuperables = \App\Models\Producto::whereHas('etiquetas', function (Builder $query) {
            $query->where('etiqueta_id', '=', 1)->where('activo', 1);
        })
        ->orderByDesc('id')
        ->get();

        $oferta = \App\Models\Producto::whereHas('etiquetas', function (Builder $query) {
            $query->where('etiqueta_id', '=', 2)->where('activo', 1);
        })
        ->orderByDesc('id')
        ->get();
        $novedades = \App\Models\Producto::whereHas('etiquetas', function (Builder $query) {
            $query->where('etiqueta_id', '=', 3)->where('activo', 1);
        })
        ->orderByDesc('id')
        ->get();
        $masVendido = \App\Models\Producto::whereHas('etiquetas', function (Builder $query) {
            $query->where('etiqueta_id', '=', 4)->where('activo', 1);
        })
        ->orderByDesc('id')
        ->get();


        $sliders = \App\Models\Slider::where('activo',1)->get();
        $categoriasdestacadas = \App\Models\Categoria::where('destacada',1)->get();
        $combosHome = \App\Models\Combo::where('activo',1)->inRandomOrder()->limit(10)->get();

        return view('frontend.home', compact('insuperables','oferta', 'novedades', 'masVendido','sliders','combosHome', 'categoriasdestacadas'));
    }

    public function ventatelefonica()
    {

        $oferta = \App\Models\Producto::whereHas('etiquetas', function (Builder $query) {
            $query->where('etiqueta_id', '=', 2);
        })
        ->orderByDesc('id')
        ->get();

        return view('frontend.venta-telefonica', compact('oferta'));
    }

    public function ofertas()
    {

        $oferta = \App\Models\Producto::whereHas('etiquetas', function (Builder $query) {
            $query->where('etiqueta_id', '=', 2)->where('activo', 1);
        })
        ->orderByDesc('id')
        ->get();

        return view('frontend.ofertas', compact('oferta'));
    }

    public function insuperables()
    {
        $insuperables = \App\Models\Producto::whereHas('etiquetas', function (Builder $query) {
            $query->where('etiqueta_id', '=', 1)->where('activo', 1);
        })
        ->orderByDesc('id')
        ->get();

        return view('frontend.insuperables', compact('insuperables'));
    }

    public function lomasvendido()
    {
        $masVendido = \App\Models\Producto::whereHas('etiquetas', function (Builder $query) {
            $query->where('etiqueta_id', '=', 4)->where('activo', 1);
        })
        ->orderByDesc('id')
        ->get();

        return view('frontend.masvendido', compact('masVendido'));
    }

    public function novedades()
    {
        $novedades = \App\Models\Producto::whereHas('etiquetas', function (Builder $query) {
            $query->where('etiqueta_id', '=', 3)->where('activo', 1);
        })
        ->orderByDesc('id')
        ->get();

        return view('frontend.novedades', compact('novedades'));
    }

    public function ventaempresas(){
        $categoriasdestacadas = \App\Models\Categoria::where('destacada',1)->get();
        return view('frontend.venta-empresas', compact('categoriasdestacadas'));
    }
}
