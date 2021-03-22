<div class="container py-8">
    <x-table-responsive>
        <div class="px-6 py-2 bg-blue-200 flex items-center">
            <div class="flex-1">
                <input wire:keydown="clean_page" wire:model="search" class="form-input w-3/4 shadow-sm rounded-md p-2" placeholder="Pesquisar por Curso...">
            </div>
            <div>
                <a class="btn btn-info" href="{{route('instructor.courses.create')}}">Criar Curso</a>
            </div>
        </div>
        @if ($courses->count())
            <table class="min-w-full">
                <thead class="bg-blue-300">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-blue-800 uppercase tracking-wider">
                            Nome
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-blue-800 uppercase tracking-wider">
                            Matriculados
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-blue-800 uppercase tracking-wider">
                            Classificação
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-blue-800 uppercase tracking-wider">
                            Status
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Editar</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-blue-200">
                    @foreach ($courses as $course)
                        <tr>
                            <td class="px-6 py-2 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        @isset($course->image)
                                            <img class="h-10 w-10 object-cover object-center rounded-lg" src="{{Storage::url($course->image->url)}}" alt="">
                                        @else
                                            <img class="w-10 h-10 object-cover object-center rounded-lg" src="{{asset('img/courses/no-image.png')}}" alt="">
                                        @endisset
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-blue-900">
                                        {{$course->title}}
                                        </div>
                                        <div class="text-sm text-blue-500">
                                        {{$course->category->name}}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-2 whitespace-nowrap">
                                <div class="text-sm text-blue-900">{{$course->students->count()}}</div>
                            </td>
                            <td class="px-6 py-2 whitespace-nowrap">
                                <div class="text-sm text-blue-900 flex items-center">
                                    {{$course->rating}}
                                    <ul class="flex text-sm ml-2">
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
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-2 whitespace-nowrap">
                                @switch($course->status)
                                    @case(1)
                                        <span class="px-2 w-full block text-center text-xs leading-5 font-semibold rounded-full bg-red-600 text-white">
                                            Desenvolvimento
                                        </span>
                                        @break
                                    @case(2)
                                        <span class="px-2 w-full block text-center text-xs leading-5 font-semibold rounded-full bg-yellow-500 text-white">
                                            Análise
                                        </span>
                                        @break
                                    @case(3)
                                        <span class="px-2 w-full block text-center text-xs leading-5 font-semibold rounded-full bg-green-600 text-white">
                                            Publicado
                                        </span>
                                        @break
                                    @default

                                @endswitch
                            </td>
                            <td class="px-6 py-2 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{route('instructor.courses.edit', $course)}}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="bg-blue-300 px-6 py-2">
                {{$courses->links()}}
            </div>
        @else
            <div class="bg-blue-200 px-6 py-2">
                Não há coincidência com o termo pesquisado...<i class="fas fa-frown icons-awesome"></i>
            </div>
        @endif
    </x-table-responsive>
</div>
