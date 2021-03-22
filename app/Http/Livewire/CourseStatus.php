<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class CourseStatus extends Component
{
    use AuthorizesRequests;

    public $course, $current;

    public function mount(Course $course) {
        $this->course = $course;

        /* Recuperar todas as lições do curso e ver qual a primeira não completada e encerra o foreach */
        foreach ($course->lessons as $lesson) {
            if (!$lesson->completed) {
                $this->current = $lesson;
                break;
            }
        }
        /* Qdo todas as unidades foram concluídas */
        if (!$this->current) {
            /* Recupera a última unidade do curso */
            $this->current = $course->lessons->last();
        }

        /* Não permitir que usuário não matriculado acesse um curso */
        $this->authorize('registered', $course);
    }

    public function render()
    {
        return view('livewire.course-status');
    }

    /* MÉTODOS */
    /* Trocamos a lição atual pela clicada */
    public function changeLesson(Lesson $lesson) {
        $this->current = $lesson;
    }

    public function completed() {
        if ($this->current->completed) {
            /* Eliminar registro de lição finalizada em lesson_user */
            $this->current->users()->detach(auth()->user()->id);
        } else {
            /* Registrar como lição finalizada em lesson_user */
            $this->current->users()->attach(auth()->user()->id);
        }

        /* Altera o ícone na seção de vídeo */
        $this->current = Lesson::find($this->current->id);

        /* Altera o ícone na seção das listas de lições */
        $this->course = Course::find($this->course->id);
    }
    /* métodos */

    /* PROPRIEDADES */
    /* Recupera um array com todos os id da coleção e depois recupera o índice da lição corrente*/
    public function getIndexProperty() {
        return $this->course->lessons->pluck('id')->search($this->current->id);
    }

    public function getPreviousProperty() {
        if ($this->index == 0) {
            return null;
        } else {
            return $this->course->lessons[$this->index - 1];
        }
    }

    public function getNextProperty() {
        if ($this->index == $this->course->lessons->count() - 1) {
            return null;
        } else {
            return $this->course->lessons[$this->index + 1];
        }
    }

    /* Calcular percentual de unidades concluídas */
    public function getAdvanceProperty() {
        /* Qtd de lições do curso CONCLUÍDAS */
        $i = 0;

        foreach ($this->course->lessons as $lesson) {
            if ($lesson->completed) {
                $i++;
            }
        }

        /* Cálculo da porcentagem */
        $advance = (($i * 100) / ($this->course->lessons->count()));

        return round($advance, 2);  /* duas decimais */
    }
    /* propriedades */
}
