<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CrearPersonaje;
use App\RegistraClase;
use App\RegistraCambios;
use Illuminate\Support\Facades\DB;

class MostrarPersonajeController extends Controller
{
    //
    public function mostrar($id)
    {
        $personaje = CrearPersonaje::where('id', $id)->first();
        
        return view('personaje', compact('personaje'));
    }

    public function mostrarTodos(){
        //$personajes = RegistraCambios::all();
        //$personajesSinCambios = CrearPersonaje::paginate(4)->all();
        $personajesSinCambios = CrearPersonaje::all();
        $clases = RegistraClase::all();
        
        //dd($personajesSinCambios);
       /* $personajes = DB::select('SELECT * FROM cambios AS c1 WHERE NOT EXISTS
        (SELECT * FROM cambios AS c2 WHERE c1.idPersonaje = c2.idPersonaje AND c1.fecha < c2.fecha)');
        dd($personajes);*/
        
        return view('mostrartodospersonajes', compact('personajesSinCambios','clases'));
    }
}
