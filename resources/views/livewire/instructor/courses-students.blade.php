<div>

    <h1 class="text-2xl text-center font-bold uppercase">Alunos Matriculados</h1>
    <hr class="mt-2 mb-6">

    <x-table-responsive>
        <div class="px-6 py-2 bg-blue-200">
            <input wire:model="search" class="form-input w-full shadow-sm rounded-md p-2" placeholder="Pesquisar por Aluno ou E-mail...">
        </div>
        @if ($students->count())
            <table class="min-w-full">
                <thead class="bg-blue-300">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-blue-800 uppercase tracking-wider">
                            Nome
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-blue-800 uppercase tracking-wider">
                            E-mail
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Editar</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-blue-200">
                    @foreach ($students as $student)
                        <tr>
                            <td class="px-6 py-2 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="w-10 h-10 object-cover object-center rounded-full" src="{{$student->profile_photo_url}}" alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-blue-900">
                                        {{$student->name}}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-2 whitespace-nowrap">
                                <div class="text-sm text-blue-900">{{$student->email}}</div>
                            </td>
                            <td class="px-6 py-2 whitespace-nowrap text-right text-sm font-medium">
                                <a href="" class="text-indigo-600 hover:text-indigo-900">Visualizar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="bg-blue-300 px-6 py-2">
                {{$students->links()}}
            </div>
        @else
            <div class="bg-blue-200 px-6 py-2">
                Não há Alunos Matriculados...<i class="fas fa-frown icons-awesome"></i>
            </div>
        @endif
    </x-table-responsive>

</div>
