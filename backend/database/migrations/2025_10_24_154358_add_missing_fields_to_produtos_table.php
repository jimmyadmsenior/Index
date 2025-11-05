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
        Schema::table('produtos', function (Blueprint $table) {
            $table->integer('estoque')->default(0)->after('preco');
            $table->boolean('ativo')->default(true)->after('estoque');
            $table->text('especificacoes')->nullable()->after('descricao');
            $table->decimal('peso', 8, 3)->nullable()->after('especificacoes');
            $table->string('cor')->nullable()->after('peso');
            $table->integer('garantia_meses')->default(12)->after('cor');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropColumn([
                'estoque',
                'ativo', 
                'especificacoes',
                'peso',
                'cor',
                'garantia_meses'
            ]);
        });
    }
};
