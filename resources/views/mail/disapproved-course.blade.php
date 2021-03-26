<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        body {
            line-height: 1.5;
            background-color: darkcyan;
        }
        span {
            font-weight: bold;
            color: blue;
            font-size: medium;
        }
    </style>
</head>
<body>
    <div><img class="mb-6" src="{{asset('img/home/logoAncora152x054.png')}}" alt="Âncora Soluções em TI"></div>
    <h1 class="mb-2">Curso Reprovado</h1>
    <p class="mb-2">Prof(ª) {{$course->teacher->name}}:</p>
    <p class="mb-4">Seu curso <span>{{$course->title}}</span> foi reprovado.</p>
    <h2 class="mb-2">Observações:</h2>
    <p class="mb-6">{!!$course->observation->body!!}</p>
    <span>Âncora Cursos</span>
</body>
</html>
