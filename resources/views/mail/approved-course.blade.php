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
            font-size: large;
        }
    </style>
</head>
<body>
    <div><img class="mb-6" src="{{asset('img/home/logoAncora152x054.png')}}" alt="Âncora Soluções em TI"></div>
    <h1 class="mb-2">Curso Aprovado</h1>
    <p class="mb-2">Prof(ª) {{$course->teacher->name}}:</p>
    <p class="mb-4">Seu curso <span>{{$course->title}}</span> foi aprovado com sucesso e já está publicado.</p>
    <span>Âncora Cursos</span>
</body>
</html>
