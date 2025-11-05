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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('codigo_rastreamento')->unique();
            $table->decimal('valor_total', 10, 2);
            $table->json('produtos'); // Array de produtos comprados
            $table->enum('status', ['processando', 'separacao', 'transporte', 'entregue'])->default('processando');
            $table->timestamp('data_envio')->nullable();
            $table->timestamp('data_entrega')->nullable();
            $table->string('transportadora')->default('SEDEX');
            $table->text('observacoes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
