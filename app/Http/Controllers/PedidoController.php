<?php


namespace App\Http\Controllers;

error_reporting (E_ALL ^ E_NOTICE);
use App\Models\Pedido;
use Illuminate\Http\Request;
use DVDoug\BoxPacker\Packer;

use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Mail;
use App\Mail\NotificacionFerreteroProximaVencerse;
use App\Mail\NotificacionFerreteroVencido;


class PedidoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::join('users', 'users.id', '=', 'pedidos.user_id')
        ->select('pedidos.id', 'users.name', 'pedidos.estado_pedido_id', 'pedidos.total', 'pedidos.estado_pago', 'pedidos.created_at')
        ->orderBy('id','desc')->paginate(10);
        
        // $fa = date('d-m-Y'); 
        $fa = strtotime(date("d-m-Y"));

        $ferreteros = \App\Models\Ferretero::get();

        foreach ($pedidos as $pedido) {
            if($pedido->estado_pedido_id != '6' && $pedido->estado_pago == '2'){

                
                $fp = date("d-m-Y",strtotime($pedido->created_at));
                // $fvf1 = date("d-m-Y",strtotime($fp."+ 1 days")); // Prueba
                $fvf1 = date("d-m-Y",strtotime($fp."+ 15 days"));
                // $fvf = date("d-m-Y",strtotime($fp."+ 1 days")); // Prueba
                $fvf = date("d-m-Y",strtotime($fp."+ 30 days"));
                
                foreach ($ferreteros as $key => $ferretero) {

                    if( $ferretero['user_id'] == $pedido->user_id ) {
                        // dd($fvf1);

                        if( $fa == strtotime(date($fvf1)) ){
                            // dd( $fa.'<br>'.strtotime(date($fvf1)) );

                            $response = Mail::to( $ferretero['email'] )->send(new NotificacionFerreteroProximaVencerse($ferretero, $pedido, $fvf));
                        }
                        elseif( $fa > strtotime($fvf)){

                            $response = Mail::to( $ferretero['email'] )->send(new NotificacionFerreteroVencido($ferretero, $pedido, $fvf));
                        }
                    }
                }

                
            }

            if($pedido->estado_pedido_id != '6' && $pedido->estado_pago == '7'){

                
                $fp = date("d-m-Y",strtotime($pedido->created_at));
                // $fvf1 = date("d-m-Y",strtotime($fp."+ 1 days")); // Prueba
                $fvf1 = date("d-m-Y",strtotime($fp."+ 5 days"));

                $fvf = date("d-m-Y",strtotime($fp."+ 10 days"));
                
                foreach ($ferreteros as $key => $ferretero) {

                    if( $ferretero['user_id'] == $pedido->user_id ) {
                        // dd($fvf1);

                        if( $fa == strtotime(date($fvf1)) ){
                            // dd( $fa.'<br>'.strtotime(date($fvf1)) );

                            $response = Mail::to( $ferretero['email'] )->send(new NotificacionFerreteroProximaVencerse($ferretero, $pedido, $fvf));
                        }
                        elseif( $fa > strtotime($fvf)){

                            $response = Mail::to( $ferretero['email'] )->send(new NotificacionFerreteroVencido($ferretero, $pedido, $fvf));
                        }
                    }
                }

                
            }

        }

        
        return view('backend.pedidos.index', compact('pedidos'));



    }

    public function index_vencimiento()
    {
        $pedidos = Pedido::join('users', 'users.id', '=', 'pedidos.user_id')
        ->select('pedidos.id', 'users.name', 'pedidos.estado_pedido_id', 'pedidos.total', 'pedidos.estado_pago', 'pedidos.created_at')
        ->orderBy('created_at','asc')->paginate(10);
        return view('backend.pedidos.index', compact('pedidos'));
    }

    public function index_vencimiento_down()
    {
        $pedidos = Pedido::join('users', 'users.id', '=', 'pedidos.user_id')
        ->select('pedidos.id', 'users.name', 'pedidos.estado_pedido_id', 'pedidos.total', 'pedidos.estado_pago', 'pedidos.created_at')
        ->orderBy('created_at','desc')->paginate(10);
        return view('backend.pedidos.index', compact('pedidos'));
    }

    public function index_total()
    {
        $pedidos = Pedido::join('users', 'users.id', '=', 'pedidos.user_id')
        ->select('pedidos.id', 'users.name', 'pedidos.estado_pedido_id', 'pedidos.total', 'pedidos.estado_pago', 'pedidos.created_at')
        ->orderBy('total','asc')->paginate(10);
        return view('backend.pedidos.index', compact('pedidos'));
    }

    public function index_total_down()
    {
        $pedidos = Pedido::join('users', 'users.id', '=', 'pedidos.user_id')
        ->select('pedidos.id', 'users.name', 'pedidos.estado_pedido_id', 'pedidos.total', 'pedidos.estado_pago', 'pedidos.created_at')
        ->orderBy('total','desc')->paginate(10);
        return view('backend.pedidos.index', compact('pedidos'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        $estadosPedido = \App\Models\EstadoPedido::all();
        return view('backend.pedidos.show', compact('pedido','estadosPedido'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        $pedido->fill([
            "estado_pedido_id" => $pedido->estado_pedido_id + 1
        ]);
        $pedido->save();
        
        return redirect('/pedidos/ordenesencurso')->with('status', ['success', 'bx bx-check-circle', "Se ha cambiado el estado del pedido No. ".$pedido->id." con éxito"]);
    }

    public function update_pago(Request $request, Pedido $pedido)
    {
        $pedido->fill([
            "estado_pago" => 1
        ]);
        $pedido->save();
        
        return redirect('/pedidos/ordenesencurso')->with('status', ['success', 'bx bx-check-circle', "Se ha cambiado el estado del pedido No. ".$pedido->id." con éxito"]);
    }

    public function reembolsar_pago(Request $request, Pedido $pedido)
    {
        $pedido->fill([
            "estado_pago" => 5,
        ]);
        $pedido->save();
        
        return redirect('/pedidos')->with('status', ['success', 'bx bx-check-circle', "Se ha cambiado el estado del pedido No. ".$pedido->id." con éxito"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        //
    }

    public function evento(Request $request)
    {
        $cadena =
        $request['data']['transaction']['id'].
        $request['data']['transaction']['status'].
        $request['data']['transaction']['amount_in_cents'].
        $request['timestamp'].
        env('WOMPI_EVENTOS');

        if (hash("sha256", $cadena) == $request['signature']['checksum']) {

            $pedido = Pedido::find($request['data']['transaction']['reference']);
            if ($request['data']['transaction']['status'] == 'APPROVED') {
                $pedido->estado_pedido_id = 5;
                $pedido->wompi_id = $request['data']['transaction']['id'];

                $pedido->save();
            }
            else {

            }
        }

        return 'es diferente';
    }

    public function respuesta()
    {
        $id = $_GET['id'];

        // dd($id);

        // CONSULTA CURL API WOMPI

        $WOMPI_INTEGRIDAD_PRIVADA = 'prv_test_CV6e0DhIx4hbtUreAqlz3P6majCOEmZ2';

        // https://production.wompi.co/v1/transactions
        // $url = 'https://sandbox.wompi.co/v1/transactions' . $WOMPI_INTEGRIDAD_PRIVADA . '/' . $id;
        
        $curl = curl_init();

        // Set cURL options
        curl_setopt($curl, CURLOPT_URL, 'https://sandbox.wompi.co/v1/transactions/'.$id);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' .$WOMPI_INTEGRIDAD_PRIVADA,
        ]);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);

        // Execute the cURL request
        $response = curl_exec($curl);

        // Decode the JSON response
        $data = json_decode($response, true);

        // Check for errors and handle the response
        if (curl_errno($curl)) {
            // echo 'cURL error: ' . curl_error($curl) . ' (' . curl_errno($curl) . ')';
        } elseif (isset($data['error'])) {
            // echo 'API error: ' . $data['error'];
        } else {
            // Extract and display relevant data
            // echo 'Data received: ' . print_r($data, true);
            foreach ($data as $value) {
                # code...
                // dd($value['id']);
                $estado = null;
                $estado = $value["status"];
                // dd($estado);

                if( $estado == "APPROVED" ){
                    $ped = Pedido::findOrFail($_GET['pedidoId']);


                    $ped->fill([
                        'wompi_id' => $id,
                        'estado_pago' => '1'
                    ]);
                    $ped->save();

                    $pedido = Pedido::firstWhere('wompi_id', $_GET['id']);
                }
                else {
                    $ped = Pedido::findOrFail($_GET['pedidoId']);


                    $ped->fill([
                        'wompi_id' => $id,
                        'estado_pedido_id' => 6,
                        'estado_pago' => 6
                    ]);
                    $ped->save();

                    $pedido = Pedido::firstWhere('wompi_id', $_GET['id']);
                }
            }
        }

        // Close the cURL session
        curl_close($curl);


        // if( $curl->status )
        // dd($c);

        
        
        // dd($pedido);

        // dd($pedido->envio);
        return view('frontend.pedidos.respuesta', compact('pedido'));
    }

    public function respuestaFerretero(Pedido $pedido)
    {
        if ($pedido->estado_pedido_id == 1) {
            
            $pedido->estado_pedido_id = 1;
            $pedido->estado_pago = 2;
            $pedido->save();

            $usuario = auth()->user()->id;
            $ferretero = \App\Models\Ferretero::find( auth()->user()->ferretero->id );

            // dd( $ferretero );

            $saldo = auth()->user()->ferretero->cupo - $pedido->total;

            $ferretero->fill([
                "cupo" => $saldo
            ]);
            $ferretero->save();

        }
        return view('frontend.pedidos.respuesta-ferretero', compact('pedido'));
    }

    public function respuestaFerreteroContado(Pedido $pedido)
    {
        if ($pedido->estado_pedido_id == 1) {
            
            $pedido->estado_pedido_id = 1;
            $pedido->estado_pago = 7;
            $pedido->save();

        }
        return view('frontend.pedidos.respuesta-ferretero', compact('pedido'));
    }

    public function ordenesencurso(){
        $estadosPedido = \App\Models\EstadoPedido::where('id', '<=', '5')->get();
        $domiciliarios = \App\Models\User::where('rol_id', 4)->get();

        $pedidos = Pedido::where('estado_pedido_id', '<', '6')
            ->orWhere('estado_pedido_id', '>', '8')
            ->orderBy('id','desc')->paginate(5);

        return view('backend.pedidos.encurso', compact('estadosPedido', 'pedidos', 'domiciliarios'));
    }

    public function buscarpedido(){
        $id = $_GET['id'];
        $estado = $_GET['estado'];
        $domiciliarios = \App\Models\User::where('rol_id', 4)->get();

        // dd($estado);

        if($id != ''){
            $pedidos = Pedido::where('id', '=', $id)->orderBy('id','desc')->paginate(5);
        }

        elseif($estado != ''){
            $pedidos = Pedido::where('estado_pedido_id', '=', $estado)->orderBy('id','desc')->paginate(5);
        }
        elseif($estado != 'todos'){
            $pedidos = Pedido::where('estado_pedido_id', '<', '5')->orderBy('id','desc')->paginate(5);
        }
        else {
            $pedidos = Pedido::where('estado_pedido_id', '<', '5')->orderBy('id','desc')->paginate(5);
        }
        $estadosPedido = \App\Models\EstadoPedido::where('id', '<', '5')->get();
        return view('backend.pedidos.encurso', compact('estadosPedido', 'pedidos', 'domiciliarios'));

    }

    public function asignardomiciliario(Request $request, Pedido $pedido){
        
        // dd($pedido);
        // $codigo = intval($request['codigo']);


        // $pedido = \App\Models\Pedido::where("codigo",$codigo)->get();

        $pedido->fill([
            "id_transportador" => $request['domiciliario'],
        ]);
        
        $pedido->save();

        return redirect('/pedidos/ordenesencurso')->with('status', ['success', 'bx bx-check-circle', "El transportador se ha asignado con éxito"]);
    }

    public function cancelar(Pedido $pedido)
    {
        // $codigo = intval($request['codigo']);
        // $pedido = \App\Models\Pedido::findOrFail($codigo);

        // dd($pedido->estado_pedido_id + 1);

        $pedido->fill([
            "estado_pedido_id" => 6
        ]);
        $pedido->save();

        // $pedidos = Pedido::orderBy('id','desc')->paginate(50);
        // return view('backend.pedidos.index', compact('pedidos'));
        return redirect('/historial-pedidos')->with('status', ['success', 'bx bx-check-circle', "Se ha cancelado el pedido No. ".$pedido->id." con éxito"]);

    }

    public function buscar(Request $request)
    {

        // dd($request['termino']);
        $pattern = "/^[a-zA-Z\sñáéíóúÁÉÍÓÚ]+$/";
        $validar_letras = preg_match($pattern, $request['termino']);

        $terminonew = str_replace(" ", "%20", $request['termino']);
        
        if( str_contains($terminonew, '%20')){

            // dd($terminonew);
            $pedidos = Pedido::join('users', 'users.id', '=', 'pedidos.user_id')
            ->select('pedidos.id', 'users.name', 'pedidos.estado_pedido_id', 'pedidos.total', 'pedidos.estado_pago', 'pedidos.created_at')
            ->where('users.name', 'LIKE', $request['termino'])
            ->orderBy('pedidos.id','desc')
            ->paginate(50);
            return view('backend.pedidos.index', compact('pedidos'));
        }
        else {
            if( $validar_letras == true ){
                $pedidos = Pedido::join('users', 'users.id', '=', 'pedidos.user_id')
                ->select('pedidos.id', 'users.name', 'pedidos.estado_pedido_id', 'pedidos.total', 'pedidos.estado_pago', 'pedidos.created_at')
                ->where('users.name', 'LIKE', '%'.$request['termino'].'%')
                ->orderBy('pedidos.id','desc')
                ->paginate(50);
                return view('backend.pedidos.index', compact('pedidos'));
            }   
            else {
                $pedidos = Pedido::join('users', 'users.id', '=', 'pedidos.user_id')
                ->select('pedidos.id', 'users.name', 'pedidos.estado_pedido_id', 'pedidos.total', 'pedidos.estado_pago', 'pedidos.created_at')
                ->where('pedidos.id', 'LIKE', $request['termino'])
                ->orderBy('pedidos.id','desc')
                ->paginate(50);
                return view('backend.pedidos.index', compact('pedidos'));
            }
        }
        

        
    }

}
