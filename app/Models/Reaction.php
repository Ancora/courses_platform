<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    use HasFactory;

    /* Popular tabela massivamente */
    protected $guarded = ['id'];

    const LIKE      = 1;
    const DISLIKE   = 2;

    public function reactionable()
    {
        return $this->morphTo();
    }

    /* Relacionamentos */
    /* 1:N Inversa */
    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
