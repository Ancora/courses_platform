<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Level;
use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function __construct() {
        $this->middleware('can:Acessar Lista de Cursos')->only('index');
        $this->middleware('can:Criar Cursos')->only('create', 'store');
        $this->middleware('can:Atualizar Cursos')->only('edit', 'update', 'goals');
        $this->middleware('can:Excluir Cursos')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('instructor.courses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $levels = Level::pluck('name', 'id');
        $prices = Price::pluck('name', 'id');

        return view('instructor.courses.create', compact('categories', 'levels', 'prices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:courses',
            'subtitle' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'level_id' => 'required',
            'price_id' => 'required',
            'file' => 'image',
        ]);

        /*  Cria o registro do curso */
        $course = Course::create($request->all());

        /* Cria o registro da imagem */
        if ($request->file('file')) {
            $url = Storage::put('courses', $request->file('file'));

            $course->image()->create([
                'url' => $url,
            ]);
        }

        /* Confirma a criação do curso e imagem */
        return redirect(route('instructor.courses.edit', $course));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('instructor.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $this->authorize('instructed', $course);

        $categories = Category::pluck('name', 'id');
        $levels = Level::pluck('name', 'id');
        $prices = Price::pluck('name', 'id');

        return view('instructor.courses.edit', compact('course', 'categories', 'levels', 'prices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $this->authorize('instructed', $course);

        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:courses,slug,' . $course->id,
            'subtitle' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'level_id' => 'required',
            'price_id' => 'required',
            'file' => 'image',
        ]);

        $course->update($request->all());

        if ($request->file('file')) {
            $url = Storage::put('courses', $request->file('file'));

            /* Verifica se o curso já possui imagem registrada */
            if ($course->image) {
                /* Se possui: exclui a anterior e atualiza com a nova */
                Storage::delete($course->image->url);

                $course->image->update([
                    'url' => $url,
                ]);
            } else {
                /* Se não possui: registra uma nova imagem */
                $course->image()->create([
                    'url' => $url,
                ]);
            }
        }

        return redirect()->route('instructor.courses.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }

    public function goals(Course $course) {
        $this->authorize('instructed', $course);

        return view('instructor.courses.goals', compact('course'));
    }

    public function status(Course $course) {
        $course->status = 2;
        $course->save();

        /* Exclui as observações, se houver */
        if ($course->observation) {
            $course->observation->delete();
        }

        return redirect()->route('instructor.courses.edit', $course);
    }

    public function observation(Course $course) {
        return view('instructor.courses.observation', compact('course'));
    }
}
