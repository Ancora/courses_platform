<section id="opinions">
    <div class="card bg-blue-500 bg-opacity-40 shadow-lg mb-4">
        <div class="card-body text-blue-400">
            <div class="flex justify-between items-center mb-8">
                <h1 class="font-bold text-2xl mb-2">Avaliações</h1>
                <ul class="flex items-center text-md">
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
                    <p class="text-yellow-500"> = {{$course->rating}}</p>
                </ul>
                @if ($course->opinions->count() == 0)
                    <p class="font-bold text-2xl text-yellow-500">Nenhuma avaliação no momento.</p>
                @else
                    <p class="font-bold text-2xl text-yellow-500">{{$course->opinions->count()}} aval.</p>
                @endif
            </div>

            @can('registered', $course)
                @can('rated', $course)
                    <article class="card card-body mb-4">
                        <h2>Faça sua avaliação do curso...</h2>
                        <textarea wire:model="comment" class="form-input w-full text-blue-700 bg-blue-300 rounded-md" rows="3"></textarea>

                        <div class="flex items-center justify-between">
                            <ul class="flex items-center text-md">
                                <li class="mr-1 cursor-pointer" wire:click="$set('rating', 1)">
                                    <i class="{{$rating == 0 ? 'far fa-star' : ($rating >= 1 ? 'fas fa-star' : 'fas fa-star-half-alt')}} text-yellow-500"></i>
                                </li>
                                <li class="mr-1 cursor-pointer" wire:click="$set('rating', 2)">
                                    <i class="{{$rating <= 1 ? 'far fa-star' : ($rating >= 2 ? 'fas fa-star' : 'fas fa-star-half-alt')}} text-yellow-500"></i>
                                </li>
                                <li class="mr-1 cursor-pointer" wire:click="$set('rating', 3)">
                                    <i class="{{$rating <= 2 ? 'far fa-star' : ($rating >= 3 ? 'fas fa-star' : 'fas fa-star-half-alt')}} text-yellow-500"></i>
                                </li>
                                <li class="mr-1 cursor-pointer" wire:click="$set('rating', 4)">
                                    <i class="{{$rating <= 3 ? 'far fa-star' : ($rating >= 4 ? 'fas fa-star' : 'fas fa-star-half-alt')}} text-yellow-500"></i>
                                </li>
                                <li class="mr-1 cursor-pointer"  wire:click="$set('rating', 5)">
                                    <i class="{{$rating <= 4 ? 'far fa-star' : ($rating == 5 ? 'fas fa-star' : 'fas fa-star-half-alt')}} text-yellow-500"></i>
                                </li>
                            </ul>
                            <button class="btn btn-info text-sm" wire:click="store">Enviar</button>
                        </div>
                    </article>
                @else
                <div class="bg-teal-100 border-t-4 border-b-4 border-blue-500 rounded-md mb-4 text-teal-900 px-4 py-3 shadow-md" role="alert">
                    <div class="flex items-center justify-center">
                        <div class="py-1">
                            <svg class="fill-current h-6 w-6 text-blue-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                        <div>
                            <p class="font-bold">Você já avaliou este curso!</p>
                        </div>
                    </div>
                    </div>
                @endcan
            @endcan

            @foreach ($course->opinions->reverse() as $opinion)
                <article class="grid grid-cols-3 mb-4 shadow-md card card-body">
                    <div class="col-span-1 flex items-center gap-2">
                        <figure>
                            <img class="h-12 w-12 object-cover rounded-full shadow-lg" src="{{$opinion->user->profile_photo_url}}" alt="">
                        </figure>

                        <div>
                            <p>
                                <b>{{Str::limit($opinion->user->name, 20)}}</b>
                                <ul class="flex items-center text-md">
                                    <li class="mr-1">
                                        <i class="{{$opinion->rating == 0 ? 'far fa-star' : ($opinion->rating >= 1 ? 'fas fa-star' : 'fas fa-star-half-alt')}} text-yellow-500"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="{{$opinion->rating <= 1 ? 'far fa-star' : ($opinion->rating >= 2 ? 'fas fa-star' : 'fas fa-star-half-alt')}} text-yellow-500"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="{{$opinion->rating <= 2 ? 'far fa-star' : ($opinion->rating >= 3 ? 'fas fa-star' : 'fas fa-star-half-alt')}} text-yellow-500"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="{{$opinion->rating <= 3 ? 'far fa-star' : ($opinion->rating >= 4 ? 'fas fa-star' : 'fas fa-star-half-alt')}} text-yellow-500"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="{{$opinion->rating <= 4 ? 'far fa-star' : ($opinion->rating == 5 ? 'fas fa-star' : 'fas fa-star-half-alt')}} text-yellow-500"></i>
                                    </li>
                                </ul>
                                {{-- date("d-m-Y", strtotime($currDate)); --}}
                                {{date('d-m-Y h:i:s', strtotime($opinion->created_at))}}
                            </p>
                        </div>
                    </div>
                    <div class="col-span-2 italic text-blue-200">
                        {{$opinion->comment}}
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
