<article class="card" x-data="{open: false}">
    <div class="card-body">
        <header>
            <h1 x-on:click="open = !open" class="cursor-pointer text-blue-200 font-bold">Recursos da Lição</h1>
        </header>

        <div x-show="open">
            <hr class="my-2">

            @if ($lesson->resource)
                <div class="flex justify-between items-center">
                    <p class="cursor-pointer">
                        <span wire:click="download" class="text-blue-900 hover:text-blue-300">
                            <i class="fas fa-download mr-1"></i>
                            {{$lesson->resource->url}}
                        </span>
                    </p>
                    <i wire:click="destroy" class="fas fa-trash-alt text-red-900 cursor-pointer"></i>
                </div>
            @else
                <form wire:submit.prevent="save">
                    <div class="flex items-center">
                        <input wire:model="file" type="file" class="form-input flex-1 rounded-md mt-1">
                        <button type="submit" class="btn btn-primary text-sm mb-1">Salvar</button>
                    </div>

                    <div wire:loading wire:target="file" class="text-blue-900 font-bold italic mt-1 text-sm">
                        Processando...
                    </div>

                    @error('file')
                        <span class="text-red-600 text-xs bg-red-200 rounded-md p-0.5">{{$message}}</span>
                    @enderror
                </form>
            @endif

        </div>
    </div>
</article>
