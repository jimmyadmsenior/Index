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
        // Cria ou atualiza o administrador master (sempre garantir que existe)
        $adminMaster = Administrador::updateOrCreate(
            ['email' => 'admin@sistema.com'],
            [
                'nome' => 'Administrador Master',
                'password' => Hash::make('admin123456'),
                'nivel_acesso' => 'master',
                'ativo' => true,
                'email_verified_at' => now(),
            ]
        );

        // Cria ou atualiza o administrador operador
        $adminOperador = Administrador::updateOrCreate(
            ['email' => 'operador@sistema.com'],
            [
                'nome' => 'Administrador Operador',
                'password' => Hash::make('operador123'),
                'nivel_acesso' => 'operador',
                'ativo' => true,
                'email_verified_at' => now(),
            ]
        );

        $this->command->info('Administradores criados/atualizados com sucesso!');
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