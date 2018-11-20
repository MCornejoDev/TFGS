<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CrearPersonaje;
use App\RegistraClase;
use App\RegistraCambios;
use App\RegistraPartida;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
Use Session;
Use Redirect;
use DB;
use Response;

class CrearpersonajeController extends Controller
{
    
    function index(){
        $idUsuario = \Auth::user()->id;
        $response= DB::select("SELECT nickPartida FROM partidas WHERE idUsuario = " . $idUsuario );
       

        return view('crearpersonaje',compact('response'));
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
                case 'SemiOrco':
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
                'vida'=>$inputs['vida'],/*Recuerda crear el input para la vida*/
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
                    'vida'=> $inputs['vida'],/*Recuerda crear el input para la vida*/
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
       
        $armadura = $inputs['armadura'];
        
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
        
        $partida = RegistraPartida::create([
            'nickPartida'=>$inputs['nickPartida'],
            'idUsuario'=>$idUsuario,
            'idPersonaje'=>$crear->id,
            'fechaCreacion'=>$fecha,
            'comentarios'=>'pruebas'
        ]);
     
        $cambios = RegistraCambios::create([
            'fecha'=>$fecha, 
            'idPartida'=>$partida->id,   
            'estado'=>'creado',
            'vida'=> $inputs['vida'],/*Recuerda crear el input para la vida*/
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
        Session::flash('message','La partida fue creada.');    
        return Redirect::to('/home');
    }

    /*function comprobar()
    {
        $idUsuario = \Auth::user()->id;
        $response= DB::select("SELECT nickPartida FROM partidas WHERE idUsuario = " . $idUsuario );

        return $response;
    }*/
}
