<div class="mb-2">
    {!! Form::label('title', 'Título', ['class' => 'text-md font-bold']) !!}
    {!! Form::text('title', null, [
        'class' => 'form-input block w-full mt-1 rounded-md text-blue-600'
        . ($errors->has('title') ? ' bg-red-300' : '')]) !!}

    @error('title')
        <strong class="text-red-600 text-xs">{{$message}}</strong>
    @enderror
</div>

<div class="mb-2">
    {!! Form::label('slug', 'Slug', ['class' => 'text-md font-bold']) !!}
    {!! Form::text('slug', null, [
        'readonly' => 'readonly',
        'class' => 'form-input block w-full mt-1 rounded-md text-blue-600 readonly'
        . ($errors->has('slug') ? ' bg-red-300' : '')]) !!}
    @error('slug')
        <strong class="text-red-600 text-xs">{{$message}}</strong>
    @enderror
</div>

<div class="mb-2">
    {!! Form::label('subtitle', 'Subtítulo', ['class' => 'text-md font-bold']) !!}
    {!! Form::text('subtitle', null, [
        'class' => 'form-input block w-full mt-1 rounded-md text-blue-600'
        . ($errors->has('subtitle') ? ' bg-red-300' : '')]) !!}
    @error('subtitle')
        <strong class="text-red-600 text-xs">{{$message}}</strong>
    @enderror
</div>

<div class="mb-2">
    {!! Form::label('description', 'Descrição', ['class' => 'text-md font-bold']) !!}
    {!! Form::textarea('description', null, [
        'class' => 'form-input block w-full mt-1 rounded-md text-blue-600'
        . ($errors->has('description') ? ' bg-red-300' : '')]) !!}
    @error('description')
        <strong class="text-red-600 text-xs">{{$message}}</strong>
    @enderror
</div>

<div class="grid grid-cols-3 gap-4 mb-2">
    <div>
        {!! Form::label('category_id', 'Categoria', ['class' => 'text-md font-bold']) !!}
        {!! Form::select('category_id', $categories, null, ['class' => 'form-input block w-full mt-1 rounded-md text-blue-600']) !!}
        {{-- @error('category_id')
            <strong class="text-red-600 text-xs">{{$message}}</strong>
        @enderror --}}
    </div>
    <div>
        {!! Form::label('level_id', 'Nível', ['class' => 'text-md font-bold']) !!}
        {!! Form::select('level_id', $levels, null, ['class' => 'form-input block w-full mt-1 rounded-md text-blue-600']) !!}
        {{-- @error('level_id')
            <strong class="text-red-600 text-xs">{{$message}}</strong>
        @enderror --}}
    </div>
    <div>
        {!! Form::label('price_id', 'Preço', ['class' => 'text-md font-bold']) !!}
        {!! Form::select('price_id', $prices, null, ['class' => 'form-input block w-full mt-1 rounded-md text-blue-600']) !!}
        {{-- @error('price_id')
            <strong class="text-red-600 text-xs">{{$message}}</strong>
        @enderror --}}
    </div>
</div>

<h1 class="text-md font-bold mb-2">Imagem</h1>
<div class="grid grid-cols-2 gap-4">
    <figure>
        @isset($course->image)
            <img id="picture" class="w-full h-64 object-cover object-center rounded-md" src="{{Storage::url($course->image->url)}}" alt="">
        @else
            <img id="picture" class="w-full h-64 object-cover object-center rounded-md" src="{{asset('img/courses/no-image.png')}}" alt="">
        @endisset
    </figure>
    <div>
        <p class="mb-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Qui dolorem enim a nam praesentium possimus cupiditate aliquid beatae voluptatibus architecto.</p>
        {!! Form::file('file', [
            'class' => 'form-input w-full btn btn-primary'
            . ($errors->has('file') ? ' bg-red-300' : ''),
            'id' => 'file', 'accept' => 'image/*']) !!}
        @error('file')
            <strong class="text-red-600 text-xs">{{$message}}</strong>
        @enderror
    </div>
</div>
