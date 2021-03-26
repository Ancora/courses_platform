@extends('adminlte::page')

@section('title', 'Âncora Cursos - Admin')

@section('content_header')
    <h1>Âncora Cursos - Aguardando Aprovação</h1>
@stop

@section('content')
    {{-- Mensagens --}}
    @if (session('info'))
        <div class="alert alert-success alert-dismissible fade-show">
            {{session('info')}}<i class="fas fa-smile"></i>
            <button class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif
    {{-- mensagens --}}
    <div class="card">
        <div class="card-header">Analisar Curso</div>
        <div class="card-body">
            <table class="table table-striped table-sm table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Instrutor</th>
                        <th>Categoria</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($courses as $course)
                        <tr>
                            <td>{{$course->id}}</td>
                            <td>{{$course->title}}</td>
                            <td>{{$course->teacher->name}}</td>
                            <td>{{$course->category->name}}</td>
                            <td width="10em">
                                <a class="btn btn-sm" style="background-color: yellow" href="{{route('admin.courses.show', $course)}}">Analisar</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">Não há Cursos aguardando aprovação</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{$courses->links('vendor.pagination.bootstrap-4')}}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
