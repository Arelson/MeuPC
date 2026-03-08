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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo'); // Define se é cpu, gpu, ram, etc.
            $table->string('nome');
            $table->decimal('preco', 10, 2); // decimal para preços, com 10 dígitos no total e 2 casas decimais
            $table->integer('TDP')->nullable(); // TDP pode ser nulo para produtos que não possuem essa característica
            $table->text('descricao')->nullable(); // Descrição do produto, pode ser nula
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
