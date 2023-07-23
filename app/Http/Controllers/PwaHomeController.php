<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class PwaHomeController extends Controller
{
    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function index(){
        $sliders = \App\Models\Slider::where('activo',1)->get();

        return view('pwa.welcome', compact('sliders'));
     }
}