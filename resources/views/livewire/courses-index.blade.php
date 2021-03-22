<div>
    <div class="bg-blue-500 bg-opacity-40 py-4 mb-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex">
            {{-- Todos os Cursos --}}
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-blue-200 font-bold py-2 px-4 rounded mr-2 focus:outline-none" wire:click="resetFilters">
                <i class="fas fa-university mr-2"></i>
                Mostrar Todos
            </button>
            {{-- todos os cursos --}}
            {{-- Dropdown Categoria --}}
            <div class="relative" x-data="{ open: false }">
                <div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-blue-200 font-bold py-2 px-4 rounded mr-2 overflow-hidden focus:outline-none" id="options-menu" aria-expanded="true" aria-haspopup="true" x-on:click="open = true">
                        <i class="fas fa-tags text-xs mr-2"></i>
                        Por Categoria
                        <i class="fas fa-chevron-circle-down ml-2"></i>
                    </button>
                </div>
                <div class="origin-top-left absolute left-0 mt-2 w-56 rounded-md shadow-lg bg-blue-300 ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="options-menu" x-show="open" x-on:click.away="open = false">
                    @foreach ($categories as $category)
                        <div class="py-1" role="none">
                            <a class="cursor-pointer block px-4 py-2 text-sm text-blue-700 hover:bg-blue-100 hover:text-blue-900" role="menuitem" wire:click="$set('category_id', {{$category->id}})" x-on:click="open = false">{{$category->name}}</a>
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- dropdown categoria --}}
            {{-- Dropdown Nível --}}
            <div class="relative" x-data="{ open: false }">
                <div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-blue-200 font-bold py-2 px-4 rounded mr-2 overflow-hidden focus:outline-none" id="options-menu" aria-expanded="true" aria-haspopup="true" x-on:click="open = true">
                        <i class="fas fa-signal text-sm mr-2"></i>
                        Por Nível
                        <i class="fas fa-chevron-circle-down ml-2"></i>
                    </button>
                </div>
                <div class="origin-top-left absolute left-0 mt-2 w-56 rounded-md shadow-lg bg-blue-300 ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="options-menu" x-show="open" x-on:click.away="open = false">
                    @foreach ($levels as $level)
                        <div class="py-1" role="none">
                            <a class="cursor-pointer block px-4 py-2 text-sm text-blue-700 hover:bg-blue-100 hover:text-blue-900" role="menuitem" wire:click="$set('level_id', {{$level->id}})" x-on:click="open = false">{{$level->name}}</a>
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- dropdown nível --}}
        </div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-4 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-4 gap-y-4">
        @foreach ($courses as $course)
            <x-course-card :course="$course" />
        @endforeach
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6 pb-6">
        {{$courses->links()}}
    </div>
</div>
