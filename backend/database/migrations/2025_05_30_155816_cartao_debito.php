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
        Schema::create('cartao_debito', function (Blueprint $table) {
            $table->id('id_cd');
            $table->string('numero_cartao', 20);
            $table->string('nome_cartao', 100);
            $table->string('cvv', 4);
            $table->date('data_validade');

            $table->unsignedBigInteger('fk_cod_compra')->unique();
            $table->foreign('fk_cod_compra')
                  ->references('cod_compra')
                  ->on('compras')
                  ->onDelete('cascade'); // mantém integridade

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cartao_debito');
    }
};
