<div class="pt-20">
    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-4 mt-2">
        {{-- Área Esquerda --}}
        <div>
            <section class="card bg-blue-500 bg-opacity-40 shadow-lg mb-2">
                <div class="card-body text-blue-400">
                    <h1 class="font-bold text-md text-center md:text-lg lg:text-xl xl:text-2xl">
                        {{$course->title}}
                    </h1>
                    {{-- Dados do Professor --}}
                    <div class="flex items-center justify-between my-2 py-2 border border-blue-300 border-l-0 border-r-0">
                        <i class="fas fa-chalkboard-teacher text-5xl"></i>
                        <div class="ml-2">
                            <h1 class="font-bold text-lg">{{$course->teacher->name}}</h1>
                            <a class="text-blue-200 font-semibold text-xs" href="">{{'@' . Str::slug($course->teacher->name, '')}}</a>
                            {{-- <p class="text-blue-200 font-bold text-sm italic">{{$course->teacher->profile->title}}</p> --}}
                        </div>
                        <img class="h-12 w-12 object-cover rounded-full shadow-lg" src="{{$course->teacher->profile_photo_url}}" alt="{{$course->teacher->name}}">
                    </div>
                    {{-- dados do professor --}}
                    {{-- Progress-bar --}}
                    <p class="text-sm mt-2 text-right">{{$this->advance . '%'}} concluído</p>
                    <div class="relative my-2 pb-2">
                        <div class="overflow-hidden h-3 text-xs flex rounded-full bg-gradient-to-r from-blue-900 to-blue-300">
                            @if ($this->advance <= 25)
                                <div style="width:{{$this->advance . '%'}}" class="shadow-2xl flex flex-col text-center whitespace-nowrap text-blue-900 justify-center bg-green-300 transition-all duration-500"></div>
                            @elseif ($this->advance <= 50)
                                <div style="width:25%" class="shadow-2xl flex flex-col text-center whitespace-nowrap text-blue-900 justify-center bg-green-300 w-1/4"></div>
                                <div style="width:{{(($this->advance) - 25) . '%'}}" class="w-3/4 shadow-2xl flex flex-col text-center whitespace-nowrap text-blue-700 justify-center bg-green-500 transition-all duration-500"></div>
                            @elseif ($this->advance <= 75)
                                <div style="width:25%" class="shadow-2xl flex flex-col text-center whitespace-nowrap text-blue-900 justify-center bg-green-300 w-1/4"></div>
                                <div style="width:25%" class="shadow-2xl flex flex-col text-center whitespace-nowrap text-blue-900 justify-center bg-green-500 w-1/4"></div>
                                <div style="width:{{(($this->advance) - 50) . '%'}}" class="w-2/4 shadow-2xl flex flex-col text-center whitespace-nowrap text-blue-500 justify-center bg-green-700 transition-all duration-500"></div>
                            @else
                                <div style="width:25%" class="shadow-2xl flex flex-col text-center whitespace-nowrap text-blue-900 justify-center bg-green-300 w-1/4"></div>
                                <div style="width:25%" class="shadow-2xl flex flex-col text-center whitespace-nowrap text-blue-900 justify-center bg-green-500 w-1/4"></div>
                                <div style="width:25%" class="shadow-2xl flex flex-col text-center whitespace-nowrap text-blue-900 justify-center bg-green-700 w-1/4"></div>
                                <div style="width:{{(($this->advance) - 75) . '%'}}" class="w-1/4 shadow-2xl flex flex-col text-center whitespace-nowrap text-blue-300 justify-center bg-green-900 transition-all duration-500"></div>
                            @endif
                        </div>
                    </div>
                    {{-- progress-bar --}}
                    {{-- Seções do Curso --}}
                    <ul>
                        @foreach ($course->sections as $section)
                            <li class="mb-4">
                                <a class="bg-blue-500 bg-opacity-30 border border-blue-600 rounded-md p-2 inline-block w-full cursor-pointer">{{$section->name}}</a>
                                <div class="border border-blue-600 rounded-md px-2 py-2">
                                    <ul>
                                        @foreach ($section->lessons as $lesson)
                                            <li class="text-sm">
                                                <a class="flex cursor-pointer">
                                                    <div class="mr-2">
                                                        @if ($lesson->completed)
                                                            @if ($current->id == $lesson->id)
                                                                <i class="fas fa-clipboard text-blue-200"></i>
                                                            @else
                                                                <i class="fas fa-clipboard-check text-blue-200"></i>
                                                            @endif
                                                        @else
                                                            @if ($current->id == $lesson->id)
                                                                <i class="fas fa-clipboard"></i>
                                                            @else
                                                                <i class="far fa-clipboard"></i>
                                                            @endif
                                                        @endif
                                                    </div>
                                                    <div wire:click="changeLesson({{$lesson}})">{{$lesson->name}}</div>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    {{-- seções do curso --}}
                </div>
            </section>
        </div>
        {{-- área esquerda --}}
        {{-- Área Direita --}}
        <div class="lg:col-span-2">
            {{-- Vídeo --}}
            <section class="card bg-blue-500 bg-opacity-40 shadow-lg mb-2"">
                <div class="embed-responsive">
                    {!!$current->iframe!!}
                </div>
            </section>
            {{-- vídeo --}}
            {{-- Dados Gerais da Lição e Navegação (Anterior/Próxima) --}}
            <section class="card bg-blue-500 bg-opacity-40 shadow-lg mb-2"">
                <div class="card-body text-blue-400">
                    {{-- Dados da Lição --}}
                    <p class="text-2xl font-bold">
                        {{$current->name}}
                    </p>

                    @if ($current->description)
                        <div class="italic">
                            {{$current->description->name}}
                        </div>
                    @endif
                    {{-- dados da lição --}}
                    <div class="flex justify-between my-4">
                        {{-- Status da Lição --}}
                        <div class="flex items-center cursor-pointer" wire:click="completed">
                            @if ($current->completed)
                                <i class="fas fa-toggle-on text-2xl text-blue-200"></i>
                            @else
                                <i class="fas fa-toggle-off text-2xl"></i>
                            @endif
                            @if ($current->completed)
                                <p class="text-sm ml-2 text-blue-200">Marcar esta unidade como NÃO finalizada.</p>
                            @else
                                <p class="text-sm ml-2">Marcar esta unidade como finalizada.</p>
                            @endif
                        </div>
                        {{-- status da lição --}}
                        {{-- Download de Recursos --}}
                        @if ($current->resource)
                            <div class="flex items-center cursor-pointer hover:text-blue-200" wire:click="download">
                                <i class="fas fa-download text-base"></i>
                                <p class="text-sm ml-2">Baixar Recursos</p>
                            </div>
                        @endif
                        {{-- download de recursos --}}
                    </div>
                    {{-- Navegação (Anterior/Próxima) --}}
                    <div class="card bg-blue-500 bg-opacity-40 shadow-lg mb-4">
                        <div class="card-body border border-blue-600 rounded-md flex text-blue-200 font-bold" x-show="open">
                            @if ($this->previous)
                                <a wire:click="changeLesson({{$this->previous}})" class="cursor-pointer flex items-center gap-x-2">
                                    <i class="fas fa-arrow-circle-left"></i>
                                    <p>Anterior</p>
                                </a>
                            @endif

                            @if ($this->next)
                                <a wire:click="changeLesson({{$this->next}})" class="cursor-pointer flex items-center gap-x-2 ml-auto">
                                    <p>Próxima</p>
                                    <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                    {{-- navegação (anterior/próxima) --}}
                </div>
            </section>
            {{-- dados gerais da lição e navegação (anterior/próxima) --}}
        </div>
        {{-- área direita --}}
    </div>
</div>
