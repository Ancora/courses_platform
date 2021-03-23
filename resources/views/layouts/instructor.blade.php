<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">

        @livewireStyles

        <style>
            .bg-app {
                background-image: url({{asset('img/home/bg-app.png')}});
            }
        </style>

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="bg-app bg-contain min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Content -->
            <div class="container pt-24 grid grid-cols-5 text-blue-400">
                <aside>
                    <h1 class="font-bold text-xl mb-4">Editar Curso</h1>

                    <ul class="text-sm text-blue-600">
                        <li class="leading-7 mb-1 pl-2 border-l-4 @routeIs('instructor.courses.edit', $course) border-blue-400 @else border-transparent @endif">
                            <a href="{{route('instructor.courses.edit', $course)}}">Informações</a>
                        </li>
                        <li class="leading-7 mb-1 pl-2 border-l-4 @routeIs('instructor.courses.curriculum', $course) border-blue-400 @else border-transparent @endif">
                            <a href="{{route('instructor.courses.curriculum', $course)}}">Lições</a>
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
                    <main class="card-body">
                        {{$slot}}
                    </main>
                </div>
            </div>
        </div>

        @stack('modals')

        @livewireScripts

        {{-- Diretiva de blade para conteúdo opcional --}}
        @isset($js)
            {{$js}}
        @endisset
    </body>
</html>
