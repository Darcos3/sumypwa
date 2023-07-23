<?php

namespace App\Http\Controllers;

use App\Models\Ferretero;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotificacionFerreteroProximaVencerse;
use App\Mail\NotificacionFerreteroVencido;


class FerreteroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ferreteros = Ferretero::join('pedidos', 'pedidos.user_id', '=', 'ferreteros.user_id', 'left outer')
        ->select('ferreteros.id', 'ferreteros.email', 'ferreteros.estado_ferretero_id', 'ferreteros.nombre_representante', 'ferreteros.nombre_ferreteria', 'ferreteros.nit', 'ferreteros.direccion', 'ferreteros.cupo', 'ferreteros.created_at',  DB::raw("count(pedidos.id) as ordenes_pendientes"))
        ->get();

        // $fa = date('d-m-Y'); 
        // foreach ($ferreteros as $ferretero) {
        //     $fc = date("d-m-Y",strtotime($ferretero->created_at));
        //     $tiempocredito = $ferretero->tiempo_credito;
        //     $fvf1 = date("d-m-Y",strtotime($fc."+ 20 days"));
        //     $fvf = date("d-m-Y",strtotime($fc."+ ".$tiempocredito." days"));

        //     // dd( $fvf );

        //     if( $fa == $fvf1 ){
        //         $response = Mail::to( $ferretero->email )->send(new NotificacionFerreteroPVencido($ferretero));
        //     }
        //     elseif( $fa == $fvf ){
        //         $response = Mail::to( $ferretero->email )->send(new NotificacionFerreteroPVencido($ferretero));
        //     }
        //     elseif( $fa > $fvf ){

        //         // dd($fa);
        //         // dd($ferretero->email);
        //         $response = Mail::to( $ferretero->email )->send(new NotificacionFerreteroVencido($ferretero));
        //     }
        // }

        return view('backend.ferreteros.index', compact('ferreteros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ferretero =  Ferretero::create([
            'user_id' => auth()->user()->id,
            'nombre_ferreteria' => $request['nombre_ferreteria'],
            'nit' => $request['nit'],
            'direccion' => $request['direccion'],
            'numero_contacto' => $request['numero_contacto'],
            'email' => $request['email'],
            'nombre_representante' => $request['nombre_representante'],
            'celular' => $request['celular'],
        ]);

        $path = $request->file('camara_comercio')->store('public/ferreteros');
        $ferretero->camara_comercio = str_replace('public/ferreteros/', '', $path);

        $path = $request->file('foto_cedula')->store('public/ferreteros');
        $ferretero->foto_cedula = str_replace('public/ferreteros/', '', $path);

        $path = $request->file('foto_rut')->store('public/ferreteros');
        $ferretero->foto_rut = str_replace('public/ferreteros/', '', $path);

        $ferretero->save();

        $cupon = \App\Models\Cupon::where('nombre', 'Registro')->first();

        $conocer_cupouser = \App\Models\CuponUsuario::where('id_user', auth()->user()->id)
        ->where('id_cupon', 1)
        ->first();

        if( $conocer_cupouser == null ){
            $tienecupon = true;
            return view('frontend.usuarios.cuenta', compact('cupon','tienecupon'));
        }
        else {
            $tienecupon = false;
            return view('frontend.usuarios.cuenta', compact('cupon', 'tienecupon'));
        }

        // return view('frontend.usuarios.cuenta');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ferretero  $ferretero
     * @return \Illuminate\Http\Response
     */
    public function show(Ferretero $ferretero)
    {
        $pedidos = \App\Models\Pedido::where('user_id', $ferretero->user_id)
        ->where('pedidos.estado_pedido_id', '!=', '6')
        ->get();

        $fa = date('d-m-Y'); 
        foreach ($pedidos as $pedido) {
            $fp = date("d-m-Y",strtotime($pedido->created_at));
            $tiempocredito = $ferretero->tiempo_credito;
            $fvf1 = date("d-m-Y",strtotime($fp."+ 2 days")); // Prueba
            // $fvf1 = date("d-m-Y",strtotime($fp."+ 20 days"));
            // $fvf = date("d-m-Y",strtotime($fp."+ 1 days")); // Prueba
            $fvf = date("d-m-Y",strtotime($fp."+ 30 days"));

            if( $fa == $fvf1 ){
                $response = Mail::to( $ferretero->email )->send(new NotificacionFerreteroProximaVencerse($ferretero, $pedido, $fvf));
            }
            elseif( $fa >= $fvf ){
                $response = Mail::to( $ferretero->email )->send(new NotificacionFerreteroVencido($ferretero, $pedido, $fvf));
            }
        }
        
        return view('backend.ferreteros.show', compact('ferretero', 'pedidos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ferretero  $ferretero
     * @return \Illuminate\Http\Response
     */
    public function edit(Ferretero $ferretero)
    {
        return view('backend.ferreteros.edit', compact('ferretero'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ferretero  $ferretero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ferretero $ferretero)
    {

        if( $request['estado_ferretero_id'] == 2){
            $ferretero->fill([
                'cupo' => $request['cupo'],
                'estado_ferretero_id' => $request['estado_ferretero_id'],
                // 'tiempo_credito' => $request['tiempo_credito']
            ])->save();

            $user = User::find($ferretero->user_id);
            $user->fill([
                'rol_user' => 3
            ]);
            $user->save();

            \Mail::to(auth()->user()->email)->send(new \App\Mail\NuevoFerretero( $request['cupo'] ));

        }
        else {
            $ferretero->fill([
                'cupo' => $request['cupo'],
                'estado_ferretero_id' => $request['estado_ferretero_id'],
            ])->save();
        }



        return redirect('/ferreteros')->with('status', ['success', "Se ha actualizado el perfil ferrtero con éxito"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ferretero  $ferretero
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ferretero $ferretero)
    {
        //
    }
}
