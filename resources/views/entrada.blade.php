<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if(isset($usuario))
<a href="{{url('cuenta')}}">perfil</a>
    @endif
    <a href="login">login</a>
    <a href="registro">sing up</a>
    <a href="foro">foro</a>
    <hr>
    <br>
<h1>{{$mensaje}}</h1>
</body>
</html>