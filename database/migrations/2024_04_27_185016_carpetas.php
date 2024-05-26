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
            $table->unsignedBigInteger('carpeta_Padre')->nullable();
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
