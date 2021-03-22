<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\CourseStatus;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', HomeController::class)->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('cursos', [CourseController::class, 'index'])->name('courses.index');

Route::get('courses/{course}', [CourseController::class, 'show'])->name('courses.show');

/* Inscrição em curso */
Route::post('courses/{course}/registered', [CourseController::class, 'registered'])->middleware('auth')->name('courses.registered');

/* Fazendo a rota pelo componente, não pelo controller */
/* Route::get('course-status/{course}', [CourseController::class, 'status'])->name('courses.status'); */
Route::get('course-status/{course}', CourseStatus::class)->name('courses.status')->middleware('auth');
