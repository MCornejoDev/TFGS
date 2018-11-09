<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CrearPersonaje;
use App\RegistraClase;
use App\RegistraCambios;
use App\RegistraPartida;
use Illuminate\Support\Facades\DB;
Use Session;
Use Redirect;

class MostrarPersonajeController extends Controller
{
    //
    public function mostrar($id)
    {
        $partidas = RegistraPartida::where('id', $id)->first();
        $personajes = CrearPersonaje::where('id', $id)->first();
        $personajesC = DB::select('SELECT * FROM cambios AS c1 WHERE NOT EXISTS
        (SELECT * FROM cambios AS c2 WHERE c1.idPartida = c2.idPartida AND c1.fecha < c2.fecha)');
        //dd($personajes);
        return view('personaje', compact('personajes','personajesC','partidas'));
    }

    public function mostrarTodos(){
        //$personajes = RegistraCambios::all();
        //$personajesSinCambios = CrearPersonaje::paginate(4)->all();
        $personajesSinCambios = CrearPersonaje::paginate(3);
        $clases = RegistraClase::all();
        
        //dd($personajesSinCambios);
       /* $personajes = DB::select('SELECT * FROM cambios AS c1 WHERE NOT EXISTS
        (SELECT * FROM cambios AS c2 WHERE c1.idPersonaje = c2.idPersonaje AND c1.fecha < c2.fecha)');
        dd($personajes);*/
        
        return view('mostrartodospersonajes', compact('personajesSinCambios','clases'));
    }

    public function eliminarPersonaje($id)
    {
        $idEliminar = CrearPersonaje::findOrFail($id);
        $idEliminar->delete();
        Session::flash('message','El personaje fue eliminado.');
        $personajesSinCambios = CrearPersonaje::all();
        if(count($personajesSinCambios) > 0 )
        {
           
            return Redirect::to('/personajes?page=1');
        }
        else{
            return Redirect::to('/personajes');
        }
        
        //return back();
    }

    public function modificar(Request $request)
    {
        $inputs = $request->all();
        $idUsuario = \Auth::user()->id;
        date_default_timezone_get('Europe/Madrid');
        $fecha = date('Y-m-d H:i:s');
        
        $cambios = RegistraCambios::create([
            'idPartida'=>$inputs['idPartida'],
            'nickPartida'=>$inputs['nickPartida'],
            'fecha'=>$fecha,
            'estado'=>'modificacion',
            'vida'=>'30',
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

        Session::flash('message','El personaje fue modificado.');
        
        return back();
    }
}
