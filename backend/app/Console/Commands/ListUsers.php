<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class ListUsers extends Command
{
    protected $signature = 'users:list';
    protected $description = 'Lista todos os usuários cadastrados';

    public function handle()
    {
        $users = User::all();
        
        $this->info('=== USUÁRIOS CADASTRADOS ===');
        $this->info('Total: ' . $users->count());
        $this->line('');
        
        if ($users->count() > 0) {
            foreach ($users as $user) {
                $this->line('ID: ' . $user->id);
                $this->line('Nome: ' . $user->name);
                $this->line('Email: ' . $user->email);
                $this->line('Criado em: ' . $user->created_at->format('d/m/Y H:i:s'));
                $this->line('---');
            }
        } else {
            $this->warn('Nenhum usuário encontrado no banco de dados.');
        }
    }
}