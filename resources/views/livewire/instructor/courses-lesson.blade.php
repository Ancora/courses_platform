<div>
    @foreach ($section->lessons as $item)
        <article class="card mt-2">
            <div class="card-body">
                <header>
                    <h1><i class="far fa-play-circle mr-2 text-blue-900"></i><strong class="text-blue-200">Lição: </strong>{{$item->name}}</h1>
                </header>

                <div>
                    <hr class="my-2">
                    <p class="text-sm"><span class="text-blue-200">Plataforma: </span>{{$item->platform->name}}</p>
                    <p class="text-sm"><span class="text-blue-200">URL: </span><a class="text-blue-900 hover:text-blue-300" href="{{$item->url}}" target="_blank">{{$item->url}}</a></p>

                    <div class="flex justify-end">
                        <button class="btn btn-primary text-sm mr-2">Editar</button>
                        <button class="btn btn-danger text-sm">Excluir</button>
                    </div>
                </div>
            </div>
        </article>
    @endforeach
</div>
