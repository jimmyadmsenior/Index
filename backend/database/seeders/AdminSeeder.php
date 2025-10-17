<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Administrador;

class AdminSeeder extends Seeder
{
    /**
     * Executa o seeder dos administradores.
     */
    public function run(): void
    {
        // Verifica se já existem administradores
        if (Administrador::exists()) {
            $this->command->info('Administradores já existem no sistema.');
            return;
        }

        // Cria o primeiro administrador (Master)
        Administrador::create([
            'nome' => 'Administrador Master',
            'email' => 'admin@sistema.com',
            'password' => Hash::make('admin123456'),
            'nivel_acesso' => 'master',
            'ativo' => true,
            'email_verified_at' => now(),
        ]);

        // Cria o segundo administrador (Operador)
        Administrador::create([
            'nome' => 'Administrador Operador',
            'email' => 'operador@sistema.com',
            'password' => Hash::make('operador123'),
            'nivel_acesso' => 'operador',
            'ativo' => true,
            'email_verified_at' => now(),
        ]);

        $this->command->info('Administradores criados com sucesso!');
        $this->command->info('');
        $this->command->info('=== CREDENCIAIS DE ACESSO ===');
        $this->command->info('');
        $this->command->info('ADMINISTRADOR MASTER:');
        $this->command->info('Email: admin@sistema.com');
        $this->command->info('Senha: admin123456');
        $this->command->info('');
        $this->command->info('ADMINISTRADOR OPERADOR:');
        $this->command->info('Email: operador@sistema.com');
        $this->command->info('Senha: operador123');
        $this->command->info('');
        $this->command->info('Acesse: http://localhost:8000/admin/login');
    }
}