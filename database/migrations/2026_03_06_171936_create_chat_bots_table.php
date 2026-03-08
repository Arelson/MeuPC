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
        Schema::create('chat_bots', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('perfil_pc_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('perfil_pc_id')->references('id')->on('perfil_p_c_s')->onDelete('cascade');

            $table->json('dados_chat')->nullable(); // Armazena os dados do chat em formato JSON

            $table->decimal('custo_total', 10, 2)->default(0); // Armazena o custo total do chat

            $table->timestamp('data_criacao')->useCurrent(); // Armazena a data de criação do chat
            $table->timestamp('data_finalizacao')->nullable(); // Armazena a data de finalização do chat, pode ser nula se o chat ainda estiver em andamento

            $table->foreignId('build_gerada_id')->nullable()->constrained('builds')->nullonDelete(); // Relacionamento com a tabela builds, pode ser nulo se o chat ainda estiver em andamento
            $table->string('status')->default('em_andamento'); // Armazena o status do chat (em_andamento, finalizado, abandonado)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat_bots');
    }
};
