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
        Schema::create('logs', function (Blueprint $table) {
            $table->id('log_id');
            $table->timestamp('data')->nullable();
            $table->timestamp('hora')->nullable();
            $table->unsignedBigInteger('usuari_id');
            $table->foreign('usuari_id')->references('usuari_id')->on('usuaris');
            $table->string('accio');
            $table->string('ipClient');
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
