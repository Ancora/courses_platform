<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Opinion;
use Livewire\Component;

class CoursesOpinions extends Component
{
    public $course_id, $comment;

    public $rating = 0;

    public function mount(Course $course) {
        $this->course_id = $course->id;
    }

    public function render()
    {
        $course = Course::find($this->course_id);

        return view('livewire.courses-opinions', compact('course'));
    }

    public function store() {
        $course = Course::find($this->course_id);

        $course->opinions()->create([
            'comment' => $this->comment,
            'rating' => $this->rating,
            'user_id' => auth()->user()->id,
        ]);
    }
}
