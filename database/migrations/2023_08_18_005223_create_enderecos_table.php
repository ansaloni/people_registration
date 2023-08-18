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
        Schema::create('enderecos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_logradouro_id');
            $table->unsignedBigInteger('cidade_id');
            $table->unsignedBigInteger('pessoa_id');
            $table->string('logradouro', 200);
            $table->integer('numero');
            $table->integer('cep')->nullable();
            $table->string('bairro', 60)->nullable();
            $table->timestamps();

            $table->foreign('tipo_logradouro_id')->references('id')->on('tipo_logradouros')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('cidade_id')->references('id')->on('cidades')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('pessoa_id')->references('id')->on('pessoas')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enderecos');
    }
};
