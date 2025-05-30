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
        Schema::create('entregas', function (Blueprint $table) {
            $table->id('cod_entrega');
            $table->string('email', 100)->nullable();
            $table->string('cep', 10)->nullable();
            $table->string('endereco', 100)->nullable();
            $table->string('telefone', 20)->nullable();
            $table->string('numero', 10)->nullable();
            $table->string('complemento', 50)->nullable();
            $table->string('nome_completo', 100)->nullable();
            $table->string('cidade', 50)->nullable();
            $table->string('bairro', 50)->nullable();
            
            $table->unsignedBigInteger('fk_cod_compra')->unique(); // Se for 1:1
            $table->foreign('fk_cod_compra')
                  ->references('cod_compra')
                  ->on('compras')
                  ->onDelete('cascade'); // opcional
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entregas');
    }
};
