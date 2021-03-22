<x-app-layout>
    <div class="container pt-24 grid grid-cols-5 text-blue-400">
        <aside>
            <h1 class="font-bold text-xl mb-4">Editar Curso</h1>

            <ul class="text-sm text-blue-600">
                <li class="leading-7 mb-1 pl-2 border-l-4 border-blue-400">
                    <a href="">Informações</a>
                </li>
                <li class="leading-7 mb-1 pl-2 border-l-4 border-transparent">
                    <a href="">Lições</a>
                </li>
                <li class="leading-7 mb-1 pl-2 border-l-4 border-transparent">
                    <a href="">Objetivos</a>
                </li>
                <li class="leading-7 mb-1 pl-2 border-l-4 border-transparent">
                    <a href="">Alunos</a>
                </li>
            </ul>
        </aside>
        <div class="col-span-4 card">
            <div class="card-body">
                <h1 class="text-2xl text-center font-bold uppercase">Informações</h1>
                <hr class="mt-2 mb-6">

                {!! Form::model($course, ['route' => ['instructor.courses.update', $course], 'method' => 'put', 'files' => true]) !!}

                    @include('instructor.courses.usuals.form')

                    <hr class="mt-6 mb-2">
                    <div class="flex justify-end">
                        {!! Form::submit('Atualizar Informações', ['class' => 'btn btn-primary']) !!}
                    </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>

        <script src="{{asset('js/instructor/course/form.js')}}"></script>
    </x-slot>
</x-app-layout>
