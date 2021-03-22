<div>
    <div class="card">
        <div class="card-header">
            <input wire:keydown="clean_page" wire:model="search" class="form-control w-100" placeholder="Pesquisar pelo Nome ou E-mail...">
        </div>
        @if ($users->count())
            <div class="card-body">
                <table class="table table-striped table-sm table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td width="10em">
                                    <a class="btn btn-info btn-sm" href="{{route('admin.users.edit', $user)}}">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{$users->links()}}
            </div>
        @else
            <div class="card-body">
                <strong>Não há registros que coincidam com sua pesquisa!</strong>
            </div>
        @endif
    </div>
</div>
