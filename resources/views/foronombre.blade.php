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
        
</body>
</html>