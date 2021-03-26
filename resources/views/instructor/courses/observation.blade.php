<x-instructor-layout :course="$course">
    <h1 class="text-2xl text-center font-bold uppercase">Observações da Reprovação</h1>
    <hr class="mt-2 mb-6">

    <div class="card">
        <div class="card-body">
            {!!$course->observation->body!!}
        </div>
    </div>

</x-instructor-layout>
