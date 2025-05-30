<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'nome', 'marca', 'categoria_id', 'preco', 'descricao', 'imagem', 'modelo'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
