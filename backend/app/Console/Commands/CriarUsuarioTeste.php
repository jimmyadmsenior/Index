<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CriarUsuarioTeste extends Command
{
    protected $signature = 'user:create-test';
    protected $description = 'Criar um usuário de teste';

    public function handle()
    {
        // Remover se já existe
        User::where('email', 'jimmy.castilho@aluno.senai.br')->delete();
        User::where('email', 'teste@exemplo.com')->delete();

        $user = User::create([
            'name' => 'Jimmy Castilho',
            'email' => 'jimmy.castilho@aluno.senai.br',
            'password' => Hash::make('123456'),
            'email_verified_at' => now(),
        ]);

        $this->info("Usuário Jimmy criado com sucesso!");
        $this->info("Email: jimmy.castilho@aluno.senai.br");
        $this->info("Senha: 123456");
        $this->info("ID: " . $user->id);
        
        return 0;
    }
}
