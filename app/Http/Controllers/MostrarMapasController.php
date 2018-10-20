<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mapas;

class MostrarMapasController extends Controller
{
    //
    function mostrar(){

        $mapas = Mapas::all();
       
        return view('mapas',compact('mapas'));
    }
}
