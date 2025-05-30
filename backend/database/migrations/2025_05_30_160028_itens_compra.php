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
        Schema::create('itens_compra', function (Blueprint $table) {
            $table->unsignedBigInteger('fk_cod_compra');
            $table->unsignedBigInteger('fk_cod_produto');
            $table->integer('quantidade');
            $table->decimal('preco_unitario', 10, 2);

            $table->primary(['fk_cod_compra', 'fk_cod_produto']);

            $table->foreign('fk_cod_compra')
                  ->references('cod_compra')
                  ->on('compras')
                  ->onDelete('cascade'); // opcional

            $table->foreign('fk_cod_produto')
                  ->references('cod_produto')
                  ->on('produtos')
                  ->onDelete('cascade'); // opcional

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itens_compra');
    }
};
