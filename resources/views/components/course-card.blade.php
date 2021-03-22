@props(['course'])

<article class="card">
    <img class="h-36 w-full object-cover" src="{{Storage::url($course->image->url)}}" alt="">
    <div class="card-body">
        <h1 class="card-title">{{Str::limit($course->title, 40)}}</h1>
        <p class="text-blue-300 text-sm text-center mb-2">Prof.: {{$course->teacher->name}}</p>
        <div class="flex justify-around">
            <p class="text-blue-300 text-xs mb-2 italic">
                {{$course->category->name}} - {{$course->level->name}}
            </p>
        </div>
        <div class="flex justify-between">
            <ul class="flex text-sm">
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
                <p class="text-yellow-500">
                    = {{$course->rating}} ({{$course->opinions_count}} aval.)
                </p>
            </ul>
            <p class="text-blue-400">
                <i class="fas fa-users"></i>
                ({{$course->students_count}})
            </p>
        </div>
            <div class="flex justify-center">
                <a href="{{route('courses.show', $course)}}" type="submit" class="btn btn-primary">
                    Mais informações
                </a>
        </div>
    </div>
</article>
