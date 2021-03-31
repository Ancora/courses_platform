<x-app-layout>
    <div class="max-w-4xl mx-auto pt-24 sm:px-6 lg:px-8 py-12 text-blue-400">
        <div class="card p-2">
            <h1 class="text-2xl text-center font-bold uppercase">Detalhes do Pedido</h1>
            <hr class="mt-2 mb-6">
            <article class="flex items-center">
                <img class="h-20 w-20 mr-2 object-cover rounded-md" src="{{Storage::url($course->image->url)}}" alt="">
                <h1 class="text-lg">{{$course->title}}</h1>
                <p class="text-lg font-bold ml-auto">
                    R$ {{number_format($course->price->value, 2, ',', '.')}}
                </p>
            </article>

            <div class="flex justify-end">
                <a href="{{route('payment.pay', $course)}}" class="btn btn-info">
                    <div class="flex items-center">
                        <p>Confirmar Compra com</p>
                        <i class="fab fa-cc-paypal text-4xl ml-2"></i>
                    </div>
                </a>
            </div>

            <div class="card my-8 mx-12 p-4 text-sm text-blue-300">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolor molestias soluta id accusamus qui quibusdam suscipit fugiat possimus harum molestiae.
                <a href="" class="text-red-300 font-bold">Termos e Condições</a>
            </div>
        </div>
    </div>
</x-app-layout>
