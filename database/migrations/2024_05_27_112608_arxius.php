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
        Schema::create('arxius', function (Blueprint $table) {
            $table->id('arxiu_id');
            $table->string('nom');
            $table->string('ruta');
            $table->unsignedBigInteger('carpeta_padre')->nullable();
            $table->foreign('carpeta_padre')->references('carpeta_id')->on('carpetas');
            $table->unsignedBigInteger('empresa_id');
            $table->foreign('empresa_id')->references('empresa_id')->on('empresa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
