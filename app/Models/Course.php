<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    /* Popular tabela massivamente */
    protected $guarded = ['id', 'status'];

    protected $withCount = ['students', 'opinions'];

    const OPEN      = 1;
    const REVISION  = 2;
    const PUBLISHED = 3;

    /* Adicionar um atributo ao modelo; o nome do método segue uma convenção */
    public function getRatingAttribute() {
        if ($this->opinions_count) {
            return round($this->opinions->avg('rating'), 1); // sem () para que retorne a coleção
        } else {
            return 0;
        }
    }

    /* Query Scopes => personalizar o WHERE */
    public function scopeCategory($query, $category_id) {
        if ($category_id) {
            return $query->where('category_id', $category_id);
        }
    }

    public function scopeLevel($query, $level_id) {
        if ($level_id) {
            return $query->where('level_id', $level_id);
        }
    }

    public function scopeUser($query, $user_id) {
        if ($user_id) {
            return $query->where('user_id', $user_id);
        }
    }

    /* Mostrar o slug na url, ao invés do id */
    public function getRouteKeyName() {
        return 'slug';
    }

    /* Relacionamentos */
    /* 1:N */
    public function opinions() {
        return $this->hasMany('App\Models\Opinion');
    }

    public function requirements() {
        return $this->hasMany('App\Models\Requirement');
    }

    public function goals() {
        return $this->hasMany('App\Models\Goal');
    }

    public function audiences() {
        return $this->hasMany('App\Models\Audience');
    }

    public function sections() {
        return $this->hasMany('App\Models\Section');
    }

    /* 1:N inversa */
    public function teacher() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function level() {
        return $this->belongsTo('App\Models\Level');
    }

    public function category() {
        return $this->belongsTo('App\Models\Category');
    }

    public function price() {
        return $this->belongsTo('App\Models\Price');
    }

    /* N:N */
    public function students() {
        return $this->belongsToMany('App\Models\User');
    }

    /* 1:N com Model intermediário */
    /* Model intermediário: Section */
    public function lessons() {
        return $this->hasManyThrough('App\Models\Lesson', 'App\Models\Section');
    }

    /* 1:1 Polimórfica */
    public function image() {
        return $this->morphOne('App\Models\Image', 'imageable');
    }
}
