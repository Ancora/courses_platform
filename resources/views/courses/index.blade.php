<x-app-layout>
    <div class="grid lg:flex bg-fixed pt-20">
    </div>
    <div>
        <section class="h-full w-full object-cover" style="background-image: url({{asset('img/courses/bg-courses.jpg')}})">
            <div class="container pt-4 pb-64">
                <div class="w-full md:w-3/4 lg:w-1/2 bg-cover rounded-md p-2" style="background-image: url({{asset('img/home/bg-app.png')}})">
                    <h1 class="text-blue-800 font-extrabold text-4xl">Âncora Cursos: os melhores cursos online</h1>
                    <p class="text-blue-500 text-lg mt-2 mb-4">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Asperiores nam inventore quaerat repellendus quo ab odio aut quas ipsa?</p>

                    @livewire('search')

                </div>
            </div>
        </section>

        @livewire('courses-index')

    </div>
</x-app-layout>
