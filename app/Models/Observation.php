<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
    use HasFactory;

    /* Registro massivo */
    protected $fillable = [
        'body',
        'course_id',
    ];

    /* Relacionamentos */
    /* 1:1 inversa */
    public function course() {
        return $this->belongsTo('App\Models\Course');
    }
}
