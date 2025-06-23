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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_vendedor');
            $table->unsignedBigInteger('id_jogo')->nullable();
            $table->unsignedBigInteger('id_figura')->nullable();
            $table->unsignedBigInteger('id_console')->nullable();
            $table->timestamps();

            $table->foreign('id_usuario')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('id_vendedor')->references('id')->on('vendedores')->onDelete('cascade');
            $table->foreign('id_jogo')->references('id')->on('jogos')->onDelete('cascade');
            $table->foreign('id_figura')->references('id')->on('figuras')->onDelete('cascade');
            $table->foreign('id_console')->references('id')->on('consoles')->onDelete('cascade');
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
