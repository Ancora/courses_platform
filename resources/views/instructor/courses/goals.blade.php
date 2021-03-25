<x-instructor-layout :course="$course">

    <div>
        @livewire('instructor.courses-goals', ['course' => $course], key('instructor.courses-goals-' . $course->id))
    </div>

    <div class="my-4">
        @livewire('instructor.courses-requirements', ['course' => $course], key('instructor.courses-requirements-' . $course->id))
    </div>

    <div>
        @livewire('instructor.courses-audiences', ['course' => $course], key('instructor.courses-audiences-' . $course->id))
    </div>

</x-instructor-layout>
