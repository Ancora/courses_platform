<div class="form-group">
    {!! Form::label('name', 'Nome') !!}
    {!! Form::text(
        'name',
        null,
        [
            'class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''),
            'placeholder' => 'Nome da função...']) !!}

    @error('name')
        <span class="invalid-feedback">
            <strong>{{$message}}</strong>
        </span>
    @enderror
</div>

<strong>Permissões</strong>
@error('permissions')
    <div>
        <small class="text-danger">
            <strong>{{$message}}</strong>
        </small>
    </div>
@enderror
@foreach ($permissions as $permission)
    <div>
        <label>
            {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
            {{$permission->name}}
        </label>
    </div>
@endforeach
