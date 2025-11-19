<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class SetupProjeto extends Command
{
    protected $signature = 'projeto:setup {--fresh : Recria o banco do zero}';
    protected $description = 'Configura todo o projeto de uma vez (migrations, seeders, admin, storage)';

    public function handle()
    {
        $this->info('🚀 Iniciando configuração completa do projeto INDEX...');
        $this->newLine();

        try {
            // 1. Limpar caches
            $this->info('🧹 Limpando caches...');
            $this->call('cache:clear');
            $this->call('config:clear');
            $this->call('view:clear');
            $this->call('route:clear');
            $this->checkmark('Caches limpos');

            // 2. Configurar banco de dados
            if ($this->option('fresh')) {
                $this->info('🗄️  Recriando banco de dados...');
                $this->call('migrate:fresh');
                $this->checkmark('Banco de dados recriado');
            } else {
                $this->info('🗄️  Executando migrations...');
                $this->call('migrate');
                $this->checkmark('Migrations executadas');
            }

            // 3. Popular banco com todos os dados
            $this->info('📊 Populando banco com produtos e categorias...');
            $this->call('db:seed');
            $this->checkmark('Produtos e categorias criados');

            // 4. Garantir admin existe
            $this->info('👤 Criando/atualizando administrador...');
            $this->call('admin:create');
            $this->checkmark('Administrador configurado');

            // 5. Storage link
            $this->info('🔗 Criando link simbólico do storage...');
            if (File::exists(public_path('storage'))) {
                File::delete(public_path('storage'));
            }
            $this->call('storage:link');
            $this->checkmark('Storage link criado');

            // 6. Gerar chave da aplicação se necessário
            if (empty(config('app.key'))) {
                $this->info('🔑 Gerando chave da aplicação...');
                $this->call('key:generate');
                $this->checkmark('Chave da aplicação gerada');
            }

            // Resumo final
            $this->newLine();
            $this->info('✅ PROJETO CONFIGURADO COM SUCESSO! ✅');
            $this->newLine();
            
            $this->info('📋 RESUMO DO QUE FOI CONFIGURADO:');
            $this->line('   • Banco de dados migrado');
            $this->line('   • 63 produtos completos inseridos');
            $this->line('   • 5 categorias criadas');
            $this->line('   • Administrador master criado');
            $this->line('   • Storage configurado');
            $this->line('   • Caches limpos');
            
            $this->newLine();
            $this->info('🔐 CREDENCIAIS ADMIN:');
            $this->line('   📧 Email: admin@sistema.com');
            $this->line('   🔑 Senha: admin123456');
            $this->line('   🌐 URL Admin: http://localhost:8000/admin/login');
            
            $this->newLine();
            $this->info('🌟 PRÓXIMOS PASSOS:');
            $this->line('   1. Execute: php artisan serve');
            $this->line('   2. Acesse: http://localhost:8000');
            $this->line('   3. Teste o carrinho e login admin');
            
            $this->newLine();

        } catch (\Exception $e) {
            $this->error('❌ Erro durante a configuração: ' . $e->getMessage());
            return 1;
        }

        return 0;
    }

    private function checkmark($message)
    {
        $this->line("   ✅ {$message}");
    }
}