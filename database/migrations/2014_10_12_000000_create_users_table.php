<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Aixo es una migracio la qual ens crea una taula amb els camps que es mostren a continuacio, pots opmlir amb un usuari per defecte fent php artisan db:seed --class=UsuarisSeeder, si vas al arxiu UsuarisSeeder.php podras veure com es fa. dintre de la carpeta seeder veuras les credencials
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('nom');
            $table->string('hora');
            $table->unsignedBigInteger('empresa_id')->nullable();
            $table->foreign('empresa_id')->references('empresa_id')->on('empresa')->onDelete('cascade');
            $table->string('token')->nullable();
            $table->boolean('admin')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
