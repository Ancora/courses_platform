<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    /* Popular tabela massivamente */
    protected $guarded = ['id'];

    /* Relacionamentos */
    /* 1:1 Polimórfica */
    public function resourceable() {
        return $this->morphTo();
    }
}
