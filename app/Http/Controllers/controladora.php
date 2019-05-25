<?php

namespace App\Http\Controllers;
use App\cuentas;
use App\grupos;
use App\foros;
use App\temas;
use Illuminate\Http\Request;

session_start();
class controladora extends Controller
{
  public function comprobarlogin()
  {

    try {
      if(isset($_SESSION["usuario"])){
        return true;
      }else{
        return false;
      }
    } catch (\Throwable $th){
        echo("Error : " . $th);
    }
   
  }

  public function entrada(Request $req)
  {
    
    
    try {
    
      $mensaje = "";  
      if($this->comprobarlogin()){
        $mensaje = 'bienvenido'. $_SESSION["usuario"]->nombre;
        return view('entrada')
        ->with('mensaje', $mensaje)
        ->with('usuario', $_SESSION["usuario"]);
      }else{
        $mensaje = 'inicio';
        return view('entrada')
        ->with('mensaje', $mensaje);
      }
    } catch (\Throwable $th){
        echo("Error : " . $th);
    }
   
  }

  public function meterseperfil(Request $req)
  {
    
    
    try {
    
      $mensaje = "";  
      if($this->comprobarlogin()){
        $mensaje = 'bienvenido'. $_SESSION["usuario"]->nombre;
        return view('perfil')
        ->with('mensaje', $mensaje);
      }else{
        $mensaje = 'inicio';
        return view('entrada')
        ->with('mensaje', $mensaje);
      }
    } catch (\Throwable $th){
        echo("Error : " . $th);
    }
   
  }

  public function login(Request $req)
  {
    
    
    try {

      $mensaje = "";  
      if($this->comprobarlogin()){
        $mensaje = 'bienvenido'. $_SESSION["usuario"]->nombre;
        return view('perfil')
        ->with('mensaje', $mensaje);
      }else{
        $mensaje = 'inicio';
        return view('login')
        ->with('mensaje', $mensaje);
      }
    } catch (\Throwable $th){
        echo("Error : " . $th);
    }
   
  }
  public function singUp(Request $req)
  {
    
    
    try {

      $mensaje = "";  
      if($this->comprobarlogin()){
        $mensaje = 'bienvenido'. $_SESSION["usuario"]->nombre;
        return view('perfil')
        ->with('mensaje', $mensaje);
      }else{
        $mensaje = 'inicio';
        return view('singUp')
        ->with('mensaje', $mensaje);
      }
    } catch (\Throwable $th){
        echo("Error : " . $th);
    }
   
  }

  public function registrocompletado(Request $req)
  {
      $cadena_fecha_actual = date('Y-m-d H:i:s');
      var_dump($cadena_fecha_actual);
    
    try {

        
      $insertusuario = cuentas::insert(['nombre' => $req->nombre, 'mail' => $req->mail , 'fecha_creacion' => $cadena_fecha_actual , 'clave' => $req->clave]);
      $_SESSION["usuario"] = $this->usuario($req->nombre);
      $mensaje = 'usuario registrado con exito \n\n bienvenido '.$req->nombre;
      return view('perfil')->with('mensaje', $mensaje);

    } catch (\Throwable $th) {

      $mensaje = 'Error al insertar los datos: ' . $th; 
      return view('singUp')->with('mensaje', $mensaje);
        
    }
   
  }

  public function creartema(Request $req)
  {
      $cadena_fecha_actual = date('Y-m-d H:i:s');
      
    
    try {

        
      $insertusuario = temas::insert(['id_cuenta' => $_SESSION["usuario"]->id, 'nombre' => $req->nombre , 'mensajes' => 1 , 'fecha_creacion' => $cadena_fecha_actual, 'id_foro' => $_SESSION["foro"]->id, 'descripcion' => $req->descripcion]);
      $temas = temas::where('id_foro' , $_SESSION["foro"]->id)->get();
      $mensaje = 'tema creado con exito '.$req->nombre;
      return view('foronombre')
        ->with('mensaje' , $mensaje)
        ->with('nombre' , $_SESSION['foro']->nombre)
        ->with('temas' , $temas)
        ->with("usuario" , $_SESSION["usuario"]);

    } catch (\Throwable $th) {
      $mensaje = 'Error al insertar los datos: ' . $th;
      return view('entrada')->with('mensaje' , $mensaje); 
     
        
    }
   
  }
  
  
    public function logueado(Request $req)
    {
      var_dump("xd");
      
      try {

        $mensaje = ""; 
        if (isset($_SESSION["usuario"])) {
          
          return view("entrada")->with('mensaje',$mensaje = 'bienvenido'. $_SESSION["usuario"]->nombre )->with('usuario' , $_SESSION["usuario"]);
        }else{
          $usuario = cuentas::where('nombre', $req->nombre)->first();
        
        
        var_dump($usuario);
        $usuarioyclave = $usuario->where('clave' , $req->clave)->first();

        if(is_null($usuarioyclave)){

            if($usuario){
              $mensaje = 'contraseña incorrecta';
            }else{
              $mensaje = 'no existe el usuario';  
            }

            return view('login')->with('mensaje', $mensaje);

        }else{
            
          $_SESSION["usuario"] = $usuario;
           var_dump("xd");
            return view('perfil')->with('mensaje', 'bienvenido '.$usuario->nombre);
        }
        }
        
      } catch (\Throwable $th) {
          echo("Error : " . $th);
      }
     
    }

    
    

    public function foro(Request $req)
    {
        
      
      try {

          
        $foros = foros::get();
        
        $mensaje = 'entrada al foro con exito';
        return view('foro')
        ->with('mensaje', $mensaje)
        ->with('foros', $foros);

      } catch (\Throwable $th) {

        $mensaje = 'Error' . $th; 
        return view('singUp')->with('mensaje', $mensaje);
          
      }
     
    }

    public function foronombres(Request $req )
    {
        
      
      try {

          
        
        
        $mensaje = 'oleeeeeee';
        
          $foro = foros::where('nombre' , $req->nombre)->first();
       
        
        
        $temas = temas::where('id_foro' , $foro->id)->get();
        
        $usuario = "";
        if($this->comprobarlogin()){
          $usuario=$_SESSION["usuario"];
        }
        $_SESSION["foro"] = $foro;
        return view('foronombre')
        ->with('mensaje' , $mensaje)
        ->with('nombre' , $foro->nombre)
        ->with('temas' , $temas)
        ->with("usuario" , $usuario);
        

      } catch (\Throwable $th) {

        $mensaje = 'Error' . $th; 
        return view('singUp')->with('mensaje', $mensaje);
          
      }
     
    }
    public function usuario(string $nombre)
      {
       return cuentas::where('nombre' , $nombre)->first();
      }
    public function temas(Request $req)
    {
        
      
      try {

          
        
        
        $mensaje = 'ha salido bien';
       var_dump($req->nombre);
        return view('tema')
        ->with('mensaje' , $mensaje)
        ->with('tema', $req->nombre);
        
        

      } catch (\Throwable $th) {

        $mensaje = 'Error' . $th; 
        return view('tema')->with('mensaje', $mensaje);
          
      }
      
     
    }
}
