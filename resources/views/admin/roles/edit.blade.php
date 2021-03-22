@extends('adminlte::page')

@section('title', 'Âncora Cursos - Editar Função')

@section('content_header')
    <h1>Editar Função Administrativa</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {{--  Usando Laravel Collective: já possui method=POST (padrão) e crsf inclusos --}}
            {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'put']) !!}

                @include('admin.roles.usuals.form')

                {!! Form::submit('Alterar Função', ['class' => 'btn btn-info btn-sm mt-2']) !!}
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
