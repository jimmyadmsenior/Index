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
        Schema::create('compras', function (Blueprint $table) {
            $table->id('cod_compra');
            $table->date('data');
            $table->enum('pagamento', ['pix', 'credito', 'debito']);
            $table->unsignedBigInteger('fk_cod_cliente');
            $table->foreign('fk_cod_cliente')
                  ->references('cod_cliente')
                  ->on('clientes')
                  ->onDelete('cascade'); // opcional: define o comportamento ao excluir um cliente
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};
