<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeederUsuaris extends Seeder
{
    /**
     * Run the database seeds.
     */
    // Per executar aquest seeder s'ha d'execura aquesta comanda php artisan db:seed --class=SeederUsuaris
    public function run(): void
    {

        //Insertem els usuaris
        DB::table('users')->insert([
            'username' => 'SuperAdmin',
            'email' => 'thos.vazquez.alex@gmail.com',
            'nom' => 'Admin',
            'hora' => now(),
            'email_verified_at' => now(),
            'password' => bcrypt('Alexinyo_2003'),
            'admin' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
