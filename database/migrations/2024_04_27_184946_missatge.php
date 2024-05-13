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
        Schema::create('missatge', function (Blueprint $table) {
            $table->id('missatge_id');
            $table->string('remitent');
            $table->timestamp('data')->nullable();
            $table->timestamp('hora')->nullable();
            $table->enum('importancia', ['poc', 'mitg', 'molt']);
            $table->string('asumpte');
            $table->string('missatge');
            $table->unsignedBigInteger('id');
            $table->foreign('id')->references('id')->on('users');
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
