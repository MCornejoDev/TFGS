<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CrearPersonaje;
use App\RegistraClase;
use App\RegistraCambios;

class CrearpersonajeController extends Controller
{
    function index(){
        return view('crearpersonaje');
    }

    function registrar(Request $request){
        $inputs = $request->all();
        //dd($inputs);
        $crear = CrearPersonaje::create([
            'raza'=>$inputs['raza'],
            'nombrePersonaje'=>$inputs['nombrePersonaje'],
            'apodo'=>$inputs['apodo'],
            'altura'=>$inputs['altura'],
            'edad'=>$inputs['edad'],
            'peso'=>$inputs['peso'],
            'sexo'=>$inputs['sexo'],
            'personalidad'=>$inputs['personalidad'],
            'habilidad1'=> $inputs['habilidad1'],
            'habilidad2'=> $inputs['habilidad2'],
            'habilidad3'=> $inputs['habilidad3'],
            'habilidad4'=> $inputs['habilidad4'],
            'nivel'=>$inputs['nivel'],
            'fuerza'=>$inputs['fuerza'],
            'destreza'=>$inputs['destreza'],
            'constitucion'=>$inputs['constitucion'],
            'inteligencia'=>$inputs['inteligencia'],
            'sabiduria'=>$inputs['sabiduria'],
            'carisma'=>$inputs['carisma'],
            'objetos'=>$inputs['objetos']
        ]);
        
    }
}
