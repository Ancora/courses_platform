<div>
    @foreach ($section->lessons as $item)
        <article class="card mt-2" x-data="{open: false}">
            <div class="card-body">

                @if ($lesson->id == $item->id)
                    <form wire:submit.prevent="update">
                        <div class="flex items-center">
                            <label class="w-32 text-blue-200">Nome: </label>
                            <input wire:model="lesson.name" class="form-input w-full p-1 ml-0.5 rounded-md text-blue-600">
                        </div>
                        @error('lesson.name')
                            <span class="text-red-600 text-xs bg-red-200 rounded-md p-0.5">{{$message}}</span>
                        @enderror

                        <div class="flex items-center my-1">
                            <label class="w-32 text-blue-200">Plataforma: </label>
                            <select wire:model="lesson.platform_id" class="w-1/3 p-1 -mx-4 rounded-md text-blue-600">
                                @foreach ($platforms as $platform)
                                    <option value="{{$platform->id}}">{{$platform->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center">
                            <label class="w-32 text-blue-200">Local: </label>
                            <input wire:model="lesson.url" class="form-input w-full p-1 ml-0.5 rounded-md text-blue-600">
                        </div>
                        @error('lesson.url')
                            <span class="text-red-600 text-xs bg-red-200 rounded-md p-0.5">{{$message}}</span>
                        @enderror

                        <div class="flex">
                            <button type="button" class="btn btn-danger text-sm mr-2" wire:click="cancel">Cancelar</button>
                            <button type="submit" class="btn btn-primary text-sm">Atualizar</button>
                        </div>

                    </form>
                @else
                    <header>
                        <h1 x-on:click="open = !open" class="cursor-pointer"><i class="far fa-play-circle mr-2 text-blue-900"></i><strong class="text-blue-200">Lição: </strong>{{$item->name}}</h1>
                    </header>

                    <div x-show="open">
                        <hr class="my-2">
                        <p class="text-sm"><span class="text-blue-200">Plataforma: </span>{{$item->platform->name}}</p>
                        <p class="text-sm"><span class="text-blue-200">Local: </span><a class="text-blue-900 hover:text-blue-300" href="{{$item->url}}" target="_blank">{{$item->url}}</a></p>

                        <div class="flex my-2">
                            <button class="btn btn-primary text-sm mr-2" wire:click="edit({{$item}})">Editar</button>
                            <button class="btn btn-danger text-sm" wire:click="destroy({{$item}})">Excluir</button>
                        </div>

                        <div>
                            @livewire('instructor.lesson-description', ['lesson' => $item], key('lesson-description-' . $item->id))
                        </div>

                        <div class="my-4">
                            @livewire('instructor.lesson-resources', ['lesson' => $item], key('lesson-resources-' . $item->id))
                        </div>
                    </div>
                @endif

            </div>
        </article>
    @endforeach

    <div class="mt-2" x-data="{open: false}">
        <a x-show="!open" x-on:click="open = true" class="flex cursor-pointer items-center">
            <i class="fas fa-video text-2xl text-yellow-500 mr-2"></i>
            <p class="text-yellow-500">Adicionar Lição</p>
        </a>

        <article class="card" x-show="open">
            <div class="card-body">
                <div>
                    <h1 class="text-xl font-bold mb-2">Adicionar Lição</h1>
                    <div class="flex items-center">
                        <label class="w-32 text-blue-200">Nome: </label>
                        <input wire:model="name" class="form-input w-full p-1 ml-0.5 rounded-md text-blue-600">
                    </div>
                    @error('name')
                        <span class="text-red-600 text-xs bg-red-200 rounded-md p-0.5">{{$message}}</span>
                    @enderror

                    <div class="flex items-center my-1">
                        <label class="w-32 text-blue-200">Plataforma: </label>
                        <select wire:model="platform_id" class="w-1/3 p-1 -mx-4 rounded-md text-blue-600">
                            @foreach ($platforms as $platform)
                                <option value="{{$platform->id}}">{{$platform->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('platform_id')
                        <span class="text-red-600 text-xs bg-red-200 rounded-md p-0.5">{{$message}}</span>
                    @enderror

                    <div class="flex items-center">
                        <label class="w-32 text-blue-200">Local: </label>
                        <input wire:model="url" class="form-input w-full p-1 ml-0.5 rounded-md text-blue-600">
                    </div>
                    @error('url')
                        <span class="text-red-600 text-xs bg-red-200 rounded-md p-0.5">{{$message}}</span>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button class="btn btn-danger mr-2" x-on:click="open = false">Cancelar</button>
                    <button class="btn btn-primary" wire:click="store">Adicionar</button>
                </div>
            </div>
        </article>
    </div>
</div>
