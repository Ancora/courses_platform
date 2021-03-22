<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function registered(User $user, Course $course) {
        /* Recupera os dados de todos os usuário matriculados no curso e verifica se o usuário autenticado está entre eles */
        return $course->students->contains($user->id);
    }

    /* Permitir acesso apenas a cursos publicados (status 3) */
    public function published(?User $user, Course $course) {
        if ($course->status == 3) {
            return true;
        } else {
            return false;
        }
    }
}
