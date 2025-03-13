<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('mahasiswas')->insert([
                'nis' => 'NIS' . rand(1000, 9999),
                'nama' => fake()->name(),
                'alamat' => fake()->address(),
                'no_hp' => fake()->phoneNumber(),
                'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
                'hobi' => fake()->word(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
