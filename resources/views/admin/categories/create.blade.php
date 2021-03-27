@extends('adminlte::page')

@section('title', 'Âncora Cursos - Admin')

@section('content_header')
    <h1>Criar Categoria</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {{--  Usando Laravel Collective: já possui method=POST (padrão) e crsf inclusos --}}
            {!! Form::open(['route' => 'admin.categories.store']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nome') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome da Categoria...']) !!}

                    @error('name')
                        <span class="text-danger text-sm"><strong>{{$message}}</strong></span>
                    @enderror
                </div>

                {!! Form::submit('Criar Categoria', ['class' => 'btn btn-primary mt-2']) !!}
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
