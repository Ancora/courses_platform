@extends('adminlte::page')

@section('title', 'Âncora Cursos - Admin')

@section('content_header')
    <h1>Editar Funções de Usuários</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">Header</div>
        <div class="card-body">
            <h5>Nome</h5>
            <p class="form-control">{{$user->name}}</p>
            <h5>Lista de Funções</h5>
            {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}
                @foreach ($roles as $role)
                    <div>
                        <label>
                            {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                            {{$role->name}}
                        </label>
                    </div>
                @endforeach
                {!! Form::submit('Atribuir Função', ['class' => 'btn btn-info btn-sm mt-2']) !!}
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
