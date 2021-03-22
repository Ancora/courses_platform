<?php

use App\Http\Controllers\Instructor\CourseController;
use Illuminate\Support\Facades\Route;
/* use App\Http\Livewire\InstructorCourses; */

Route::redirect('', 'instructor/courses');

/* Route::get('courses', InstructorCourses::class)->middleware('can:Acessar Lista de Cursos')->name('courses.index'); */

Route::resource('courses', CourseController::class)->names('courses');
