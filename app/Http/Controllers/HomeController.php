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

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        
        shuffle($arrayTotal);

        return view('home',compact('arrayTotal'));
    }
}
