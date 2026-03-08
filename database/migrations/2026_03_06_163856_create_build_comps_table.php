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
        Schema::create('build_comps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('build_id');
            $table->foreign('build_id')->references('id')->on('builds')->onDelete('cascade');
            $table->unsignedBigInteger('componente_id');
            $table->foreign('componente_id')->references('id')->on('produtos')->onDelete('cascade');
            $table->integer('quantidade')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('build_comps');
    }
};
