<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contacto;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $firstName = $request->firstName; 

        $response = Mail::to('admon.sumy@gmail.com')->send(new Contacto($request->firstName, $request->email, $request->Subject, $request->text));

        return view('frontend.contacto-recibido', compact('firstName', 'response'));
        // return $response;

    }
}
