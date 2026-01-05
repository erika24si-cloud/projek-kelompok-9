<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class CreatekategoriAset extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

    foreach (range(1, 20) as $index) {
    DB::table('kategoriAset')->insert([
        'nama'       => $faker->words(2, true),
        'kode'       => $faker->unique()->bothify('KAT-####'),
        'deskripsi'  => $faker->text(100),
        'created_at' => now(),
        'updated_at' => now(),
        ]);
    }
}
}