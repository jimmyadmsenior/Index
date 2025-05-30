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
        Schema::create('pix', function (Blueprint $table) {
            $table->id('id_pix');
            $table->string('chave_pix', 100);
            
            $table->unsignedBigInteger('fk_cod_compra')->unique(); // 1:1 com compra
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
        Schema::dropIfExists('pix');
    }
};
