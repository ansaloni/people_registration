<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tipo_logradouros', function (Blueprint $table) {
            $table->id();
            $table->string('tipo', 60);
            $table->timestamps();
        });

        DB::table('tipo_logradouros')->insert([
            ['tipo' => 'Rua'],
            ['tipo' => 'Avenida'],
            ['tipo' => 'Praça'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_logradouros');
    }
};
