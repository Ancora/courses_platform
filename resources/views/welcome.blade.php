<x-app-layout>
    <div class="grid lg:flex bg-fixed pt-20">
        <div class="lg:w-3/4">
            <section class="bg-cover rounded-md mx-4 mt-4" style="background-image: url({{asset('img/home/bg-home.png')}})">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-4 pb-64">
                    <div class="w-full md:w-3/4 lg:w-1/2 bg-cover rounded-md p-6" style="background-image: url({{asset('img/home/bg-app.png')}})">
                        <h1 class="text-blue-800 font-extrabold text-4xl">Âncora Cursos: os melhores cursos online</h1>
                        <p class="text-blue-500 text-lg mt-2 mb-4">Lorem ipsum dolores, sit amet consectetur adipisicing elit. Asperiores nam inventore quaerat repellendus quo ab odio aut quas ipsa?</p>

                        @livewire('search')

                    </div>
                </div>
            </section>
            <section class="mt-24">
                <h1 class="text-blue-800 text-center font-bold text-3xl uppercase mb-6">Saiba mais...</h1>

                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-8">
                    <article>
                        <figure>
                            <img class="rounded-xl h-60 w-full" src="{{asset('img/home/blog.png')}}" alt="Blog">
                        </figure>
                        <header class="mt-2">
                            <h1 class="text-center text-xl text-blue-700">Acesse Nosso Blog</h1>
                            <p class="text-md text-blue-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid, nobis.</p>
                        </header>
                    </article>
                    <article>
                        <figure>
                            <img class="rounded-xl h-60 w-full object-cover" src="{{asset('img/home/artigos.png')}}" alt="Artigos">
                        </figure>
                        <header class="mt-2">
                            <h1 class="text-center text-xl text-blue-700">Artigos</h1>
                            <p class="text-md text-blue-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid, nobis.</p>
                        </header>
                    </article>
                    <article>
                        <figure>
                            <img class="rounded-xl h-60 w-full object-cover" src="{{asset('img/home/fale-conosco.png')}}" alt="Cursos">
                        </figure>
                        <header class="mt-2">
                            <h1 class="text-center text-xl text-blue-700">Fale Conosco</h1>
                            <p class="text-md text-blue-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid, nobis.</p>
                        </header>
                    </article>
                </div>
            </section>
            <section class="mt-24 bg-blue-900 bg-opacity-50 py-12 rounded-md m-4">
                <h1 class="text-center text-blue-200 text-3xl">O que deseja aprender?</h1>
                <p class="text-center text-blue-200 text-sm my-4">Verifique em nosso catálogo como podemos ajuda-lo...</p>
                <div class="flex justify-center">
                    <a href="{{route('courses.index')}}" type="submit" class="bg-blue-500 hover:bg-blue-700 text-blue-200 font-bold py-2 px-4 rounded">
                        Catálogo de Cursos
                    </a>
                </div>
            </section>
        </div>
        <section class="lg:w-1/4 mt-4">
            <h1 class="text-blue-800 text-center font-bold text-3xl uppercase">Últimos Cursos</h1>
            <p class="text-md text-blue-500 text-center my-2">Verifique nossos Cursos mais recentes</p>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-4 grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-y-4 md:gap-x-4">
                @foreach ($courses as $course)
                    <x-course-card :course="$course" />
                @endforeach
            </div>
        </section>
    </div>
</x-app-layout>

