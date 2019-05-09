<?php

namespace App\Http\Controllers;
use App\cuentas;
use Illuminate\Http\Request;

class controladora extends Controller
{
    public function login(Request $req)
    {
      
      
      try {

        $mensaje = "";  
        $usuario = cuentas::where('nombre', $req->nombre)->first();
        $usuarioyclave = $usuario->where('clave' , $req->clave)->first();

        if(is_null($usuarioyclave)){

            if($usuario){
              $mensaje = 'contraseña incorrecta';
            }else{
              $mensaje = 'no existe el usuario';  
            }

            return view('login')->with('mensaje', $mensaje);

        }else{

            return view('primera')->with('mensaje', 'bienvenido '.$usuario->nombre);
        }
      } catch (\Throwable $th) {
          echo("Error : " . $th);
      }
     
    }

    public function singUp(Request $req)
    {
        $cadena_fecha_actual = date('Y-m-d H:i:s');
        var_dump($cadena_fecha_actual);
      
      try {

          
        $insertusuario = cuentas::insert(['nombre' => $req->nombre, 'mail' => $req->mail , 'fecha_creacion' => $cadena_fecha_actual , 'clave' => $req->clave]);
        $mensaje = 'usuario registrado con exito';
        return view('login')->with('mensaje', $mensaje);

      } catch (\Throwable $th) {

        $mensaje = 'Error al insertar los datos: ' . $th; 
        return view('singUp')->with('mensaje', $mensaje);
          
      }
     
    }
}
