<x-app-layout>
    <div class="grid lg:flex bg-fixed pt-20">
    </div>
    <div>
        {{-- Banner Header --}}
        <section class="h-full w-full py-12 bg-blue-500 bg-opacity-40 shadow-lg mb-2">
            <div class="max-w-xs p-2 md:max-w-2xl md:p-4 lg:max-w-4xl lg:p-8 xl:max-w-7xl xl:p-12 mx-auto grid grid-cols-1 md:grid-cols-2 rounded-md" style="background-image: url({{asset('img/home/bg-app.png')}});">
                <figure class="w-full h-72 md:h-80 lg:h-72 p-4">
                    @if ($course->image)
                        <img class="h-full w-full object-cover rounded-md" src="{{Storage::url($course->image->url)}}" alt="">
                    @else
                        <img class="h-full w-full object-cover rounded-md" src="{{asset('img/courses/no-image.png')}}" alt="">
                    @endif
                </figure>
                <div class="w-full h-72 md:h-80 lg:h-72 p-4">
                    <ul>
                        <h1 class="text-blue-800 font-bold text-xl md:text-2xl lg:text-3xl xl:text-4xl">
                            {{$course->title}}
                        </h1>
                        <h2 class="course-details italic">
                            {{Str::limit($course->subtitle, 50)}}
                        </h2>
                        <li class="course-details">
                            <i class="fas fa-tags icons-awesome"></i>
                            {{$course->category->name}}
                        </li>
                        <li class="course-details">
                            <i class="fas fa-signal icons-awesome"></i>
                            {{$course->level->name}}
                        </li>
                        <li class="course-details flex justify-between">
                            {{-- <div>
                                <i class="fas fa-tachometer-alt icons-awesome"></i>
                                {{$course->status->}}
                            </div> --}}
                            <div>
                                <i class="fas fa-users icons-awesome"></i>
                                {{$course->students_count}}
                                {{$course->students_count == 0 ? '' : ($course->students_count == 1 ? ' inscrito' : ' inscritos')}}
                            </div>
                            <div>
                                <ul class="flex items-center text-md">
                                    <li class="mr-1">
                                        <i class="{{$course->rating == 0 ? 'far fa-star' : ($course->rating >= 1 ? 'fas fa-star' : 'fas fa-star-half-alt')}} text-yellow-500"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="{{$course->rating <= 1 ? 'far fa-star' : ($course->rating >= 2 ? 'fas fa-star' : 'fas fa-star-half-alt')}} text-yellow-500"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="{{$course->rating <= 2 ? 'far fa-star' : ($course->rating >= 3 ? 'fas fa-star' : 'fas fa-star-half-alt')}} text-yellow-500"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="{{$course->rating <= 3 ? 'far fa-star' : ($course->rating >= 4 ? 'fas fa-star' : 'fas fa-star-half-alt')}} text-yellow-500"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="{{$course->rating <= 4 ? 'far fa-star' : ($course->rating == 5 ? 'fas fa-star' : 'fas fa-star-half-alt')}} text-yellow-500"></i>
                                    </li>
                                    <p class="text-yellow-500">
                                        = {{$course->rating}} ({{$course->opinions_count}} aval.)
                                    </p>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        {{-- banner header --}}
        {{-- Conteúdo --}}
        <div class="container grid grid-cols-1 lg:grid-cols-3 gap-4">
            {{-- Mensagens --}}
            @if (session('info'))
                <div class="lg:col-span-3" x-data="{open: true}" x-show="open">
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Atenção!</strong>
                        <span class="block sm:inline">{{session('info')}}<i class="fas fa-frown"></i></span>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <svg x-on:click="open = false" class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                        </span>
                    </div>
                </div>
            @endif
            {{-- mensagens --}}
            {{-- Esquerdo --}}
            <div class="order-2 lg:col-span-2 lg:order-1">
                <section class="card bg-blue-500 bg-opacity-40 shadow-lg mb-4 grid grid-cols-1 md:grid-cols-2">
                    {{-- Objetivos --}}
                    <div class="card-body text-blue-400">
                        <h1 class="font-bold text-2xl mb-2">Objetivos do Curso</h1>

                        <ul>
                            @forelse ($course->goals as $goal)
                                <li><i class="fas fa-bullseye mr-4"></i>{{$goal->name}}</li>
                            @empty
                                <li><i class="far fa-frown mr-4"></i>Sem objetivos registrados.</li>
                            @endforelse
                        </ul>
                    </div>
                    {{-- objetivos --}}
                    {{-- Requisitos para o Curso --}}
                    <div class="card-body text-blue-400">
                        <h1 class="font-bold text-2xl mb-2">Requisitos Necessários</h1>

                        <ul>
                            @forelse ($course->requirements as $requirement)
                                <li><i class="far fa-check-circle mr-4"></i>{{$requirement->name}}</li>
                            @empty
                                <li><i class="far fa-frown mr-4"></i>Sem requisitos registrados.</li>
                            @endforelse
                        </ul>
                    </div>
                    {{-- requisitos para o curso --}}
                </section>
                {{-- Descrição do Curso --}}
                <section class="card bg-blue-500 bg-opacity-40 shadow-lg mb-4">
                    <div class="card-body text-blue-400">
                        <h1 class="font-bold text-2xl mb-2">Descrição do Curso</h1>
                        {!!$course->description!!}
                    </div>
                </section>
                {{-- descrição do curso --}}
                {{-- Conteúdo Programático --}}
                <section class="card bg-blue-500 bg-opacity-40 shadow-lg mb-4">
                    <div class="card-body text-blue-400">
                        <h1 class="font-bold text-2xl mb-2">Conteúdo Programático</h1>

                        @forelse ($course->sections as $section)
                            <article class="mb-4 shadow-md bg-transparent"
                            @if ($loop->first)
                                x-data="{ open: true }"
                            @else
                                x-data="{ open: false }"
                            @endif
                            >
                                <header class="bg-blue-500 bg-opacity-30 border border-blue-600 rounded-md px-4 py-2 cursor-pointer" x-on:click="open = !open">
                                    <h1 class="font-semibold text-xl">{{$section->name}}</h1>
                                </header>
                                <div class="border border-blue-600 rounded-md px-4 py-2" x-show="open">
                                    <ul>
                                        @foreach ($section->lessons as $lesson)
                                            <li>
                                                <i class="far fa-circle mr-4"></i>
                                                {{$lesson->name}}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </article>
                        @empty
                            <p><i class="far fa-frown mr-4"></i>Sem conteúdo programático registrado.</p>
                        @endforelse
                    </div>
                </section>
                {{-- conteúdo programático --}}
            </div>
            {{-- esquerdo --}}
            {{-- Direito --}}
            <div class="order-1 lg:order-2">
                <section class="card bg-blue-500 bg-opacity-40 shadow-lg mb-2">
                    <div class="card-body text-blue-400">
                        <div class="flex items-center">
                            <img class="h-20 w-20 object-cover rounded-full shadow-lg" src="{{$course->teacher->profile_photo_url}}" alt="{{$course->teacher->name}}">
                            <div class="ml-2">
                                <h1 class="font-bold text-2xl">{{$course->teacher->name}}</h1>
                                <a class="text-blue-200 font-bold text-sm" href="">{{'@' . Str::slug($course->teacher->name, '')}}</a>
                                {{-- <p class="text-blue-200 font-bold text-sm italic">{{$course->teacher->profile->title}}</p> --}}
                            </div>
                        </div>
                    </div>
                </section>
                <section class="card bg-blue-500 bg-opacity-40 shadow-lg mb-4">
                    <div class="card-body text-blue-400">
                        {{-- Aprovação --}}
                        <form action="{{route('admin.courses.approved', $course)}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-block text-2xl font-bold focus:outline-none" style="background-color: green;">
                                Aprovar Curso
                            </button>
                        </form>
                        {{-- aprovação --}}
                        {{-- Observações sobre o curso NÃO aprovado --}}
                        <a href="{{route('admin.courses.observation', $course)}}" class="btn btn-block text-2xl text-white font-bold focus:outline-none" style="background-color: red;">Reprovar Curso</a>
                        {{-- observações sobre o curso NÃO aprovado --}}
                    </div>
                </section>
            </div>
            {{-- direito --}}
        </div>
        {{-- conteúdo --}}
    </div>
</x-app-layout>
