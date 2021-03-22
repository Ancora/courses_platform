<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /* Para controlelr que irá administrar uma única rota usa-se o método __invoke() */
    public function __invoke() {

        /* Recuperar os registros dos cursos */
        $courses = Course::where('status', '3')->latest('id')->get()->take(4);

        return view('welcome', compact('courses'));
    }
}
