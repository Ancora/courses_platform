<article class="card" x-data="{open: false}">
    <div class="card-body">
        <header>
            <h1 x-on:click="open = !open" class="cursor-pointer text-blue-200 font-bold">Descrição da Lição</h1>
        </header>

        <div x-show="open">
            <hr class="my-2">

            @if ($lesson->description)
                <form wire:submit.prevent="update">
                    <textarea wire:model="description.name" class="form-input w-full p-1 rounded-md text-blue-600"></textarea>

                    @error('description.name')
                        <span class="text-red-600 text-xs bg-red-200 rounded-md p-0.5">{{$message}}</span>
                    @enderror

                    <div class="flex justify-end">
                        <button type="submit" class="btn btn-primary text-sm mr-2">Editar</button>
                        <button wire:click="destroy" type="button" class="btn btn-danger text-sm">Excluir</button>
                    </div>
                </form>
            @else
                <div>
                    <textarea wire:model="name" class="form-input w-full p-1 rounded-md text-blue-600" placeholder="Descreva a Lição..."></textarea>

                    @error('name')
                        <span class="text-red-600 text-xs bg-red-200 rounded-md p-0.5">{{$message}}</span>
                    @enderror

                    <div class="flex justify-end">
                        <button wire:click="store" class="btn btn-primary text-sm">Adicionar</button>
                    </div>
                </div>
            @endif
        </div>
    </div>
</article>
