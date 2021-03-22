<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    use HasFactory;

    /* Popular tabela massivamente */
    protected $guarded = ['id'];

    /* Relacionamentos */
    /* 1:N */
    public function lessons()
    {
        return $this->hasMany('App\Models\Lesson');
    }
}
