<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>{{$mensaje}}</h1>
    <div class="list-group">

        @foreach($foros as $foro)
    <a href="{{url('foro/'.$foro->nombre )}}" class="list-group-item list-group-item-action active">{{$foro->nombre}}</a>
        @endforeach
    </div>
</body>
</html>