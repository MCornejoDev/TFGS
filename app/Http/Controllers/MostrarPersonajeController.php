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
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;

class MostrarPersonajeController extends Controller
{
    //
    public function mostrar($idPersonaje){
        $partidas = RegistraPartida::where('idPersonaje', $idPersonaje)->first();
        $personajes = CrearPersonaje::where('id', $idPersonaje)->first();
        
        $idPersonajeActualConLaFechaMasReciente = 
        DB::select('SELECT MAX(id) FROM cambios WHERE idPartida = ' . $partidas->id);
        $idP;
        
        foreach ($idPersonajeActualConLaFechaMasReciente as $key => $value) {
            foreach ($value as $key2 => $value2) {
                $idP = $value2;
            }
        }
        //dd($idP);
        $personajesC = DB::select('SELECT * FROM cambios WHERE idPartida = ' . $partidas->id. ' AND id = ' . $idP);
        /*$personajesC = DB::select('SELECT * FROM cambios AS c1 WHERE NOT EXISTS
        (SELECT * FROM cambios AS c2 WHERE c1.idPartida = c2.idPartida AND c1.fecha > c2.fecha AND id = '. $idP .')');*/        
        //dd($personajes);
        //dd($personajesC);
        
        return view('personaje', compact('personajes','personajesC','partidas'));
    }

    public function mostrarTodos(){
        //$personajes = RegistraCambios::all();
        //$personajesSinCambios = CrearPersonaje::paginate(4)->all();
        //$personajesSinCambios = CrearPersonaje::paginate(3);
        //$clases = RegistraClase::all();

        $idUsuario = \Auth::user()->id;
        
        $partidas = RegistraPartida::where('idUsuario','=',$idUsuario)->paginate(3);
        
        $idPersonajesDelUsuario = DB::select('SELECT idPersonaje FROM partidas WHERE idUsuario = ' . $idUsuario);
        $personajesPaginate = array();
        $clasesPaginate = array();
        $contador = 0;
       
        foreach ($idPersonajesDelUsuario as $idPerson) {
            $personaje = DB::select('SELECT * FROM personajes WHERE id = ' . $idPerson->idPersonaje); 
            $personajesPaginate[$contador] = $personaje;
            $clase = DB::select('SELECT tipo,arma,armadura,escudo FROM clase WHERE idPersonaje = ' . $idPerson->idPersonaje);
            $clasesPaginate[$contador] = $clase;
            $contador++;
        }

        #region Manipulacion de datos para la vista

        $arrayTotal = array();
        $contador = 0;
   
        foreach ($personajesPaginate as $total) {
            
            foreach($total as $tF)
            {
                $arrayTotal[$contador]['idPersonaje'] = $tF->id;
                $arrayTotal[$contador]['raza'] = $tF->raza;
                $arrayTotal[$contador]['nombrePersonaje'] = $tF->nombrePersonaje;
                $arrayTotal[$contador]['apodo'] = $tF->apodo;
                $arrayTotal[$contador]['altura'] = $tF->altura;
                $arrayTotal[$contador]['edad'] = $tF->edad;
                $arrayTotal[$contador]['peso'] = $tF->peso;
                $arrayTotal[$contador]['sexo'] = $tF->sexo;
            }
            
            $contador++;
         }

         $contador = 0;

         foreach ($clasesPaginate as $total) {
            
            foreach($total as $tF)
            {
                $arrayTotal[$contador]['tipo'] = $tF->tipo;
                $arrayTotal[$contador]['arma'] = $tF->arma;
                $arrayTotal[$contador]['armadura'] = $tF->armadura;
                $arrayTotal[$contador]['escudo'] = $tF->escudo;     
            }
            
            $contador++;
         }

        
        #endregion

        return view('mostrartodospersonajes', compact('arrayTotal','partidas'));
    }

    public function eliminarPersonaje($id){
        $idEliminar = CrearPersonaje::findOrFail($id);
        $idEliminar->delete();
        // $idEliminar = RegistraCambios::findOrFail($id);
        // $idEliminar->delete();
        Session::flash('message','El personaje fue eliminado.');
        $idUsuario = \Auth::user()->id;
        $contador = 0;
        $idPersonajesDelUsuario = DB::select('SELECT idPersonaje FROM partidas WHERE idUsuario = ' . $idUsuario);
        $personajesPaginate = array();
       
        foreach ($idPersonajesDelUsuario as $idPerson) {
            $personaje = DB::select('SELECT * FROM personajes WHERE id = ' . $idPerson->idPersonaje); 
            $personajesPaginate[$contador] = $personaje;
            $contador++;
        }

        $personajesSinCambios = CrearPersonaje::all();
        if(count($personajesPaginate) > 0 )
        { 
            return Redirect::to('/personajes?page=1');
        }
        else{
            return Redirect::to('/personajes');
        }
        
        //return back();
    }

    public function modificar(Request $request){
        $inputs = $request->all();
        $idUsuario = \Auth::user()->id;
        date_default_timezone_get('Europe/Madrid');
        $fecha = date('Y-m-d H:i:s');
        
        $cambios = RegistraCambios::create([
            'idPartida'=>$inputs['idPartida'],
            'nickPartida'=>$inputs['nickPartida'],
            'fecha'=>$fecha,
            'estado'=>'modificacion',
            'vida'=>$inputs['vida'],
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

    public function grafica($id)
    {
        $partidas = RegistraPartida::where('idPersonaje', $id)->first();
        $personaje = CrearPersonaje::where('id', $id)->first();

        /*$idPersonajeActual = DB::select('SELECT MAX(id) FROM cambios WHERE idPartida = ' . $partidas->id);
        $idP;
        
        foreach ($idPersonajeActual as $key => $value) {
            foreach ($value as $key2 => $value2) {
                $idP = $value2;
            }
        }*/
      
        $personajesC = DB::select('SELECT * FROM cambios WHERE idPartida = ' . $partidas->id );/*. ' AND id = ' . $idP*/
        
        /*$personajesC = DB::select('SELECT * FROM cambios AS c1 WHERE NOT EXISTS
        (SELECT * FROM cambios AS c2 WHERE c1.idPartida = c2.idPartida AND c1.fecha > c2.fecha AND id = '. $idP .')');*/        
        //dd($personajes);
        //dd($personajesC);
        
        return view('graficapersonaje', compact('personaje','personajesC','partidas'));
    }
}
