<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Executa as migrações.
     */
    public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('marca');
            $table->unsignedBigInteger('categoria_id');
            $table->decimal('preco', 10, 2)->nullable();
            $table->text('descricao')->nullable();
            $table->string('imagem')->nullable();
            $table->string('modelo')->nullable();
            $table->timestamps();

            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
        });
    }

    /**
     * Reverte as migrações.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
