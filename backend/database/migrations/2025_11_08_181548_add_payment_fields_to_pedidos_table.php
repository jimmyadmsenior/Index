<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pedidos', function (Blueprint $table) {
            $table->enum('metodo_pagamento', ['pix', 'credito', 'debito'])->default('pix')->after('valor_total');
            $table->string('transaction_id')->nullable()->after('metodo_pagamento');
            $table->enum('status_pagamento', ['pendente', 'processando', 'aprovado', 'recusado'])->default('pendente')->after('transaction_id');
            $table->timestamp('data_pagamento')->nullable()->after('status_pagamento');
            
            // Atualizar enum do status para incluir mais opções
            $table->dropColumn('status');
        });
        
        // Recriar coluna status com novos valores
        Schema::table('pedidos', function (Blueprint $table) {
            $table->enum('status', ['processando', 'separacao', 'transporte', 'entregue', 'cancelado', 'enviado'])->default('processando')->after('produtos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pedidos', function (Blueprint $table) {
            $table->dropColumn(['metodo_pagamento', 'transaction_id', 'status_pagamento', 'data_pagamento']);
            
            // Restaurar status original
            $table->dropColumn('status');
        });
        
        Schema::table('pedidos', function (Blueprint $table) {
            $table->enum('status', ['processando', 'separacao', 'transporte', 'entregue'])->default('processando')->after('produtos');
        });
    }
};
