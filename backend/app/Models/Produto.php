<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'nome', 'marca', 'categoria_id', 'preco', 'descricao', 'imagem', 'modelo',
        'estoque', 'ativo', 'especificacoes', 'peso', 'cor', 'garantia_meses'
    ];

    protected $casts = [
        'ativo' => 'boolean',
        'preco' => 'decimal:2',
        'peso' => 'decimal:3'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    // Scopes para consultas úteis
    public function scopeAtivo($query)
    {
        return $query->where('ativo', true);
    }

    public function scopeComEstoque($query)
    {
        return $query->where('estoque', '>', 0);
    }

    public function scopeDisponivel($query)
    {
        return $query->ativo()->comEstoque();
    }
}
