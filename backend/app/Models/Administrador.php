<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Administrador extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'administradores';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nome',
        'email',
        'password',
        'nivel_acesso',
        'ativo',
        'email_verified_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'email_verified_at' => 'datetime',
            'ultimo_acesso' => 'datetime',
            'ativo' => 'boolean',
        ];
    }

    /**
     * Verifica se o administrador é master (baseado no email por enquanto)
     */
    public function isMaster(): bool
    {
        return in_array($this->email, ['admin@sistema.com', 'master@sistema.com']);
    }

    /**
     * Verifica se o administrador está ativo
     */
    public function isAtivo(): bool
    {
        return true; // Todos ativos por padrão já que não temos campo ativo
    }

    /**
     * Atualiza o último acesso (placeholder)
     */
    public function atualizarUltimoAcesso(): void
    {
        // Placeholder - não temos campos de último acesso na estrutura atual
    }

    /**
     * Método para autenticação - usa o campo password padrão do Laravel
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Scope para administradores ativos
     */
    public function scopeAtivos($query)
    {
        return $query; // Todos são ativos por padrão
    }

    /**
     * Scope para administradores master
     */
    public function scopeMaster($query)
    {
        return $query->whereIn('email', ['admin@sistema.com', 'master@sistema.com']);
    }
}