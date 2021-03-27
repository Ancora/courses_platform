@extends('adminlte::page')

@section('title', 'Âncora Cursos - Admin')

@section('content_header')
    <h1>Editar Nível</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {{--  Usando Laravel Collective: já possui method=POST (padrão) e crsf inclusos --}}
            {!! Form::model($level, ['route' => ['admin.levels.update', $level], 'method' => 'put']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nome') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome do Nível...']) !!}

                    @error('name')
                        <span class="text-danger text-sm"><strong>{{$message}}</strong></span>
                    @enderror
                </div>

                {!! Form::submit('Atualizar Nível', ['class' => 'btn btn-info mt-2']) !!}
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
