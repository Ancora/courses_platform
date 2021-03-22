<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /* Popular tabela massivamente */
    protected $guarded = ['id'];

    public function commentable(){
        return $this->morphTo();
    }

    /* Relacionamentos */
    /* 1:N Polimórfica */
    public function comments() {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    public function reactions() {
        return $this->morphMany('App\Models\Reaction', 'reactionable');
    }

    /* 1:N Inversa */
    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
