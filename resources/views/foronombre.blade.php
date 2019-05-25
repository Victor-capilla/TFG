<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <h1>{{$nombre}}</h1>
        <div class="list-group">

                @foreach ($temas as $tema)
        <a href="{{url('foro/temas/'.$tema )}}" class="list-group-item list-group-item-action active">{{$tema->nombre}}</a> 
                @endforeach  
            
        </div>
        @if($usuario != "")
       <div id="creartema">
               <hr>
               <h4>crear tema</h4>
               <br>
       <form action="{{url('foro/'.$nombre.'/creartema' )}}/" method="get">
                       
                         <label for="">nombre</label>
                         <input type="text" class="form-control" name="nombre" id=""  placeholder="">
                        
                         <label for="">descripcion</label>
                         <input type="text" class="form-control" name="descripcion" id=""  placeholder="">
                        
                         <input type="submit" value="enviar">
                       
               </form>
       </div>
        @endif()
        
</body>
</html>