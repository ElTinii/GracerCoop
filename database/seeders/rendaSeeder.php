<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class rendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('renda')->insert([
            [
                'nom' => 'BASICA',
                'preu' => '30',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'AUTONOMA',
                'preu' => '50',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'PARTIMONI',
                'preu' => '80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'TOTAL',
                'preu' => '90',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'CONJUNTA',
                'preu' => '50',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'FORA DE TERMINI',
                'preu' => '50',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'COMPLEMENTARIA',
                'preu' => '50',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
