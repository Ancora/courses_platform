<x-instructor-layout :course="$course">
    <h1 class="text-2xl text-center font-bold uppercase">Informações</h1>
    <hr class="mt-2 mb-6">

    {!! Form::model($course, ['route' => ['instructor.courses.update', $course], 'method' => 'put', 'files' => true]) !!}

        @include('instructor.courses.usuals.form')

        <hr class="mt-6 mb-2">
        <div class="flex justify-end">
            {!! Form::submit('Atualizar Informações', ['class' => 'btn btn-primary']) !!}
        </div>

    {!! Form::close() !!}

    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>

        <script src="{{asset('js/instructor/course/form.js')}}"></script>
    </x-slot>
</x-instructor-layout>
