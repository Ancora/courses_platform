@extends('adminlte::page')

@section('title', 'Âncora Cursos - Admin')

@section('content_header')
    <h1>Reprovar Curso: <strong>{{$course->title}}</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => ['admin.courses.disapproved', $course]]) !!}
                <div class="form-group">
                    {!! Form::label('body', 'Observações') !!}
                    {!! Form::textarea('body', null) !!}

                    @error('body')
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>

                {!! Form::submit('Reprovar Curso', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#body' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@stop
