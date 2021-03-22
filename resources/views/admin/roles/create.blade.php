@extends('adminlte::page')

@section('title', 'Âncora Cursos - Criar Função')

@section('content_header')
    <h1>Criar Função Administrativa</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {{--  Usando Laravel Collective: já possui method=POST (padrão) e crsf inclusos --}}
            {!! Form::open(['route' => 'admin.roles.store']) !!}

                @include('admin.roles.usuals.form')

                {!! Form::submit('Criar Função', ['class' => 'btn btn-primary mt-2']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
