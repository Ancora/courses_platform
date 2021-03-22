<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    /* Popular tabela massivamente */
    protected $guarded = ['id'];

    /* Relacionamentos */
    /* 1:N Polimórfica */
    public function imageable() {
        return $this->morphTo();
    }
}
