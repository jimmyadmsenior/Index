<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }
}
