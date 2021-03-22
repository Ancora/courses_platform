@extends('adminlte::page')

@section('title', 'Âncora Cursos - Admin')

@section('content_header')
    <h1>Lista de Funções Administrativas</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success" role="alert">
            <strong>Perfeito!</strong> {{session('info')}}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <a href="{{route('admin.roles.create')}}">Criar Curso</a>
        </div>
        <div class="card-body">
            <table class="table table-striped table-sm table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $role)
                        <tr>
                            <td width="10em">{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            <td width="10em">
                                <a class="btn btn-info btn-sm" href="{{route('admin.roles.edit', $role)}}">Editar</a>
                            </td>
                            <td width="10em">
                                <form action="{{route('admin.roles.destroy', $role)}}" method="POST">
                                    @method('delete')
                                    @csrf

                                    <button class="btn btn-danger btn-sm" type="submit">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">Não há Funções Administrativas registradas</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
