<?php

use App\Http\Controllers\Instructor\CourseController;
use App\Http\Livewire\Instructor\CoursesCurriculum;
use Illuminate\Support\Facades\Route;
/* use App\Http\Livewire\InstructorCourses; */

Route::redirect('', 'instructor/courses');

/* Route::get('courses', InstructorCourses::class)->middleware('can:Acessar Lista de Cursos')->name('courses.index'); */

Route::resource('courses', CourseController::class)->names('courses');

Route::get('courses/{course}/curriculum', CoursesCurriculum::class)->name('courses.curriculum');
