<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
Use Session;
Use Redirect;
use Auth;

class HerramientasController extends Controller
{
    //
    public function herramienta()
    {
        return view('herramientas');
    }

    public function configuracion(){
        $idUsuario = \Auth::user()->id;

        $datosUsuario = DB::select("SELECT name,email,user,password FROM users WHERE id = " . $idUsuario);

        return view('auth.configuracion',compact('datosUsuario'));
    }

    public function actualizar(Request $request){
        //Consigo el id actual del usuario
        $idUsuario = \Auth::user()->id;

        //Variable para comprobar si existe el usuario en la base de datos
        $existe = false;

        //Todos los usuarios de la base datos
        $arrayUsuarios = DB::select("SELECT user FROM users");

        //El usuario que podría ser modificado
        $usuarioActual = $request->user;
        $puedo = true;

        //Recorremos el array para encontrar si hay algún usuario igual que nuestro cambio
        for ($i=0; $i < count($arrayUsuarios) ; $i++) 
        { 
            if($arrayUsuarios[$i]->user == $usuarioActual)
            {
                echo($arrayUsuarios[$i]->user . " --> " .$usuarioActual  . "<br>");
                $puedo = false;
                $i = count($arrayUsuarios);
            }
        }

       $bonito = "";
       $usuarioAmodificar = User::find($idUsuario);
       /*if($puedo == true)
       {   
        $usuarioAmodificar->user = $usuarioActual;
        $usuarioAmodificar->save(); 
        $bonito = "El usuario ha sido modificado";
       }
       else{
        $bonito = "El usuario no ha sido modificado";
        Session::flash('message','El usuario no ha sido modificado');
        return Redirect::to('/configuración');
       }*/

       if($request->password == $request->passwordR)
       {
        $nuevaContrasenna =  Hash::make($request->password);
        $usuarioAmodificar->password = $nuevaContrasenna;
        $usuarioAmodificar->save();
        Session::flash('message','Los datos han sido modificados correctamente');
        return Redirect::to('/configuración');
       }
       else
       {
        $bonito = "Las contraseñas no son identicas";
        Session::flash('message',$bonito);
        return Redirect::to('/configuración');
       }    
    }

    public function eliminarCuenta(){
        $idUsuario = \Auth::user()->id;
        
        $idEliminar = User::findOrFail($idUsuario);
        $idEliminar->delete();

        Auth::logout();
        
        return Redirect::to('/');
    }
}
