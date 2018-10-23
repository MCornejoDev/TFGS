<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CrearPersonaje;
use App\RegistraClase;
use App\RegistraCambios;
use Illuminate\Support\Facades\DB;
Use Session;
Use Redirect;

class MostrarPersonajeController extends Controller
{
    //
    public function mostrar($id)
    {
        
        $personajes = CrearPersonaje::where('id', $id)->first();
        $personajesC = DB::select('SELECT * FROM cambios AS c1 WHERE NOT EXISTS
        (SELECT * FROM cambios AS c2 WHERE c1.idPersonaje = c2.idPersonaje AND c1.fecha < c2.fecha) AND c1.idPersonaje = ' . $id);
        //dd($personajes);
        return view('personaje', compact('personajes','personajesC'));
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
            'nickPartida'=>$inputs['nickPartida'],
            'fecha'=>$fecha,
            'idUsuario'=>$idUsuario,
            'idPersonaje'=>$inputs['idPersonaje'],
            'estado'=>'modificacion',
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
