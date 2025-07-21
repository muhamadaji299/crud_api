<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            for ($i = 1; $i <= 10; $i++) {
                DB::table('dosens')->insert([
                    'nama_dosen' => fake()->name(),
                    'nip' => fake()->unique()->numerify('19########'), // Contoh NIP dengan format 19xxxxxxxx
                    'email' => fake()->unique()->safeEmail(),
                    'no_telp' => fake()->phoneNumber(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            
    }
}
}