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
        Schema::create('carpetas', function (Blueprint $table) {
            $table->id('carpeta_id');
            $table->string('nom');
            $table->string('ruta');
            $table->unsignedBigInteger('empresa_id');
            $table->unsignedBigInteger('usuari_id');
            $table->foreign('empresa_id')->references('empresa_id')->on('empresa');
            $table->foreign('usuari_id')->references('usuari_id')->on('usuaris');
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
