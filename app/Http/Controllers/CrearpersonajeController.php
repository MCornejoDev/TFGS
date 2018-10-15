<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CrearpersonajeController extends Controller
{
    function index(){
        return view('crearpersonaje');
    }

    function registrar(Request $request){
        $inputs = $request->all();
        dd($inputs);
    }
}
