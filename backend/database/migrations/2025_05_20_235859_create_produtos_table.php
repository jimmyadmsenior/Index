<?php
// Migration desativada temporariamente para evitar erro de tabela já existente

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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('modelo')->nullable();
            $table->string('marca')->nullable();
            $table->decimal('preco', 10, 2)->default(0);
            $table->text('descricao')->nullable();
            $table->string('imagem')->nullable();
            $table->foreignId('categoria_id')->constrained('categorias');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
