<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Administrador;
use Illuminate\Support\Facades\Hash;

class CriarAdmin extends Command
{
    protected $signature = 'admin:create';
    protected $description = 'Criar/atualizar administrador master do sistema';

    public function handle()
    {
        $this->info('Criando administrador master do sistema...');

        // Força a criação/atualização do admin master
        $admin = Administrador::updateOrCreate(
            ['email' => 'admin@sistema.com'],
            [
                'nome' => 'Administrador Master',
                'password' => Hash::make('admin123456'),
                'nivel_acesso' => 'master',
                'ativo' => true,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ]
        );

        if ($admin->wasRecentlyCreated) {
            $this->info('✅ Administrador master CRIADO com sucesso!');
        } else {
            $this->info('✅ Administrador master ATUALIZADO com sucesso!');
        }

        $this->info('');
        $this->info('=== CREDENCIAIS DE LOGIN ADMIN ===');
        $this->info('');
        $this->info('📧 Email: admin@sistema.com');
        $this->info('🔑 Senha: admin123456');
        $this->info('');
        $this->info('🔗 Acesse: http://localhost:8000/admin/login');
        $this->info('');
        $this->info('✅ Agora você pode fazer login no painel administrativo!');
        
        return 0;
    }
}