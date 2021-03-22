<x-app-layout>
    <div class="grid lg:flex bg-fixed pt-20">
    </div>
    <div>
        {{-- Banner Header --}}
        <section class="h-full w-full py-12 bg-blue-500 bg-opacity-40 shadow-lg mb-2">
            <div class="max-w-xs p-2 md:max-w-2xl md:p-4 lg:max-w-4xl lg:p-8 xl:max-w-7xl xl:p-12 mx-auto grid grid-cols-1 md:grid-cols-2 rounded-md" style="background-image: url({{asset('img/home/bg-app.png')}});">
                <figure class="w-full h-72 md:h-80 lg:h-72 p-4">
                    <img class="h-full w-full object-cover rounded-md" src="{{Storage::url($course->image->url)}}" alt="">
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
            {{-- Esquerdo --}}
            <div class="order-2 lg:col-span-2 lg:order-1">
                <section class="card bg-blue-500 bg-opacity-40 shadow-lg mb-4 grid grid-cols-1 md:grid-cols-2">
                    {{-- Objetivos --}}
                    <div class="card-body text-blue-400">
                        <h1 class="font-bold text-2xl mb-2">Objetivos do Curso</h1>

                        <ul>
                            @foreach ($course->goals as $goal)
                                <li>
                                    <i class="fas fa-bullseye mr-4"></i>
                                    {{$goal->name}}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    {{-- objetivos --}}
                    {{-- Requisitos para o Curso --}}
                    <div class="card-body text-blue-400">
                        <h1 class="font-bold text-2xl mb-2">Requisitos Necessários</h1>

                        <ul>
                            @foreach ($course->requirements as $requirement)
                                <li>
                                    <i class="far fa-check-circle mr-4"></i>
                                    {{$requirement->name}}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    {{-- requisitos para o curso --}}
                </section>
                {{-- Descrição do Curso --}}
                <section class="card bg-blue-500 bg-opacity-40 shadow-lg mb-4">
                    <div class="card-body text-blue-400">
                        <h1 class="font-bold text-2xl mb-2">Descrição do Curso</h1>
                        <p>{{$course->description}}</p>
                    </div>
                </section>
                {{-- descrição do curso --}}
                {{-- Conteúdo Programático --}}
                <section class="card bg-blue-500 bg-opacity-40 shadow-lg mb-4">
                    <div class="card-body text-blue-400">
                        <h1 class="font-bold text-2xl mb-2">Conteúdo Programático</h1>

                        @foreach ($course->sections as $section)
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
                        @endforeach
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
                        {{-- Inscrição --}}
                        @can('registered', $course)
                            <h1 class="font-bold text-2xl mb-2">Continue aprendendo...</h1>
                            <a class="btn btn-info btn-block text-2xl font-bold focus:outline-none" href="{{route('courses.status', $course)}}">Acessar Videoaulas</a>
                        @else
                            <h1 class="font-bold text-2xl mb-2">Interessado? Inscreva-se...</h1>
                            <form action="{{route('courses.registered', $course)}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-block text-2xl font-bold focus:outline-none">
                                    Inscrever-se no Curso
                                </button>
                            </form>
                        @endcan
                        {{-- inscrição --}}
                    </div>
                </section>
                <aside class="hidden lg:block card bg-blue-500 bg-opacity-40 shadow-lg mb-4">
                    <h1 class="px-4 pt-4 text-blue-400 font-bold text-xl">Também pode se interessar por...</h1>
                    @foreach ($equivalents as $equivalent)
                        <article>
                            <a href="{{route('courses.show', $equivalent)}}" class="flex items-center">
                                <img class="h-32 w-32 object-cover mx-4 my-2 rounded-md shadow-md" src="{{Storage::url($equivalent->image->url)}}" alt="">
                                <div class="text-blue-200 font-semibold">
                                    <h1 class="mb-2 text-sm xl:text-md">
                                        {{Str::limit($equivalent->title, 40)}}
                                    </h1>
                                    <div class="flex items-center mb-2">
                                        <img class="h-8 w-8 xl:h-12 xl:w-12 object-cover rounded-full shadow-lg" src="{{$equivalent->teacher->profile_photo_url}}" alt="{{$equivalent->teacher->name}}">
                                        <div class="ml-2">
                                            <p class="text-xs xl:text-sm">{{$equivalent->teacher->name}}</p>
                                        </div>
                                    </div>
                                    <div>
                                        <ul class="flex items-center text-sm">
                                            <li class="mr-1">
                                                <i class="{{$equivalent->rating == 0 ? 'far fa-star' : ($equivalent->rating >= 1 ? 'fas fa-star' : 'fas fa-star-half-alt')}} text-yellow-500"></i>
                                            </li>
                                            <li class="mr-1">
                                                <i class="{{$equivalent->rating <= 1 ? 'far fa-star' : ($equivalent->rating >= 2 ? 'fas fa-star' : 'fas fa-star-half-alt')}} text-yellow-500"></i>
                                            </li>
                                            <li class="mr-1">
                                                <i class="{{$equivalent->rating <= 2 ? 'far fa-star' : ($equivalent->rating >= 3 ? 'fas fa-star' : 'fas fa-star-half-alt')}} text-yellow-500"></i>
                                            </li>
                                            <li class="mr-1">
                                                <i class="{{$equivalent->rating <= 3 ? 'far fa-star' : ($equivalent->rating >= 4 ? 'fas fa-star' : 'fas fa-star-half-alt')}} text-yellow-500"></i>
                                            </li>
                                            <li class="mr-1">
                                                <i class="{{$equivalent->rating <= 4 ? 'far fa-star' : ($equivalent->rating == 5 ? 'fas fa-star' : 'fas fa-star-half-alt')}} text-yellow-500"></i>
                                            </li>
                                            <p class="text-yellow-500">
                                                = {{$equivalent->rating}} ({{$equivalent->opinions_count}} aval.)
                                            </p>
                                        </ul>
                                    </div>
                                </div>
                            </a>
                        </article>
                    @endforeach
                </aside>
            </div>
            {{-- direito --}}
        </div>
        {{-- conteúdo --}}
    </div>
</x-app-layout>
