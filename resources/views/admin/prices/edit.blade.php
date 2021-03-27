@extends('adminlte::page')

@section('title', 'Âncora Cursos - Admin')

@section('content_header')
    <h1>Editar Preço</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {{--  Usando Laravel Collective: já possui method=POST (padrão) e crsf inclusos --}}
            {!! Form::model($price, ['route' => ['admin.prices.update', $price], 'method' => 'put']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nome') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome do Preço...']) !!}
                    @error('name')
                        <span class="text-danger text-sm"><strong>{{$message}}</strong></span>
                    @enderror

                    {!! Form::label('value', 'Valor') !!}
                    {!! Form::text('value', null, ['class' => 'form-control', 'placeholder' => 'Valor do Curso...']) !!}
                    @error('value')
                        <span class="text-danger text-sm"><strong>{{$message}}</strong></span>
                    @enderror
                </div>

                {!! Form::submit('Atualizar Preço', ['class' => 'btn btn-info mt-2']) !!}
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
