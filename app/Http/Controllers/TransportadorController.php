<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use DVDoug\BoxPacker\Packer;

use Illuminate\Support\Facades\Log;


class TransportadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transportadores = User::where('rol_id', 4)->orderBy('id','desc')->paginate(50);
        return view('backend.transportadores.index', compact('transportadores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ciudades = \App\Models\Ciudad::all();
        return view('backend.transportadores.create', compact('ciudades'));

    
    }

    public function store(Request $request)
    {
        $transportador = User::create([
            'name' => $request['nombre'],
            'apellidos' => $request['apellidos'],
            'celular' => $request['celular'],
            'email' => $request['email'],
            'cedula' => $request['cedula'],
            'rol_id' => 4,
            'estado' => isset($request['estado']) ? 1 : 0
        ]);

        try {
            $transportador->save();
            //code...
        } catch (Error $error) {
            dd($error);
        }


        return redirect('/transportadores')->with('status', ['success', 'bx bx-check-circle', "El transportador se ha creado con éxito"]);
    
    }

    public function show(User $transportador)
    {
        $ciudades = \App\Models\Ciudad::all();

        return view('backend.transportadores.show', compact('transportador','ciudades'));
    }

    public function edit(User $transportador)
    {
        //
    }

   
    public function update(Request $request, User $transportador)
    {
        $transportador->fill([
            'name' => $request['nombre'],
            'apellidos' => $request['apellidos'],
            'celular' => $request['celular'],
            'email' => $request['email'],
            'cedula' => $request['cedula'],
            'rol_id' => 4,
            'estado' => isset($request['estado']) ? 1 : 0
        ]);

        $transportador->save();

        return redirect('/transportadores')->with('status', ['success', 'bx bx-check-circle', "El transportador se ha creado con éxito"]);
    }


    public function destroy(User $transportador)
    {
        //
    }


    public function validaremail(){
        $correo = $_GET['correo'];

        $newcorreo = str_replace($correo, "%40", "@");
        
        $transportador = User::where('email', '=', $correo)->get();
        
        // return count($transportador);

        if( count($transportador)  == 0   ){
            return 'false';
        }else {
            return 'true';
        }

    }

   

}
