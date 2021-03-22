<x-app-layout>
    <div class="container pt-24 text-blue-400">
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl text-center font-bold uppercase">Criar Curso</h1>
                <hr class="mt-2 mb-6">

                {!! Form::open(['route' => 'instructor.courses.store', 'files' => true, 'autocomplete' => 'off']) !!}

                    {!! Form::hidden('user_id', auth()->user()->id) !!}

                    @include('instructor.courses.usuals.form')

                    <hr class="mt-6 mb-2">
                    <div class="flex justify-end">
                        {!! Form::submit('Criar Curso', ['class' => 'btn btn-primary cursor-pointer']) !!}
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
