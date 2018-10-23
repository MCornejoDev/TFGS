<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CrearPersonaje;
use App\RegistraClase;
use App\RegistraCambios;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class CrearpersonajeController extends Controller
{
    function index(){
        return view('crearpersonaje');
    }

    function registrar(Request $request){
        $inputs = $request->all();
        $raza="";
        if($inputs['sexo'] == 'F')
        {
            $razaFemenino = ['Humana','Elfa','SemiElfa','Orca','SemiOrca','Enana','Gnoma','Mediana'];

            switch ($inputs['raza']) {
                case 'Humano':
                        $raza = $razaFemenino[0];
                    break;
                case 'Elfo':
                        $raza = $razaFemenino[1];
                    break;
                case 'SemiElfo':
                        $raza = $razaFemenino[2];
                    break;
                case 'Orco':
                        $raza = $razaFemenino[3];
                    break;
                case 'Semi-Orco':
                        $raza = $razaFemenino[4];
                    break;
                case 'Enano':
                        $raza = $razaFemenino[5];
                    break;
                case 'Gnomo':
                        $raza = $razaFemenino[6];
                    break;
                case 'Mediano':
                        $raza = $razaFemenino[7];
                    break;   
            }
            $crear = CrearPersonaje::create([
                'raza'=> $raza,
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
        else
        {   
            
            if($inputs['sexo'] == 'M')
            {
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
       

        $escudo;
        if(!isset($inputs['escudo']))
        {
            $escudo = "";
            $clase = RegistraClase::create([
                'idPersonaje'=>$crear->id,
                'tipo'=>$inputs['clase'],
                'arma'=>$inputs['arma'],
                'armadura'=>$inputs['armadura'],
                'escudo'=>$escudo
            ]);
        }
        else
        {
            $clase = RegistraClase::create([
                'idPersonaje'=>$crear->id,
                'tipo'=>$inputs['clase'],
                'arma'=>$inputs['arma'],
                'armadura'=>$inputs['armadura'],
                'escudo'=>$inputs['escudo']
            ]);
        }
        
        $idUsuario = \Auth::user()->id;
        date_default_timezone_get('Europe/Madrid');
        $fecha = date('Y-m-d H:i:s');
        //dd($fecha);
       
        $cambios = RegistraCambios::create([
            'nickPartida'=>$inputs['nickPartida'],
            'fecha'=>$fecha,
            'idUsuario'=>$idUsuario,
            'idPersonaje'=>$crear->id,
            'estado'=>'creado',
            'nivel'=>$inputs['nivel'],
            'edad'=>$inputs['edad'],
            'fuerza'=>$inputs['fuerza'],
            'destreza'=>$inputs['destreza'],
            'constitucion'=>$inputs['constitucion'],
            'inteligencia'=>$inputs['inteligencia'],
            'sabiduria'=>$inputs['sabiduria'],
            'carisma'=>$inputs['carisma'],
            'objetos'=>$inputs['objetos']
        ]);
            
        return redirect()->route('home');
    }
}
