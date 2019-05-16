<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

   <form action="primera" method="get">
    
    {{csrf_field()}}
    nombre : <input type="text" name="nombre">
    contraseña : <input type="password" name="clave">
    enviar : <input type="submit" value="enviar">

    </form> 
<h1>{{$mensaje}}</h1>
</body>
</html>