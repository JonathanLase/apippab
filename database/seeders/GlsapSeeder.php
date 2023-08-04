<?php

namespace Database\Seeders;

use App\Models\Glsap;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GlsapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $faker = \Faker\Factory::create('id_ID');
        // for ($i = 0; $i < 5; $i++) {
        //     Buku::create([
        //         'glsap' => $faker->,
        //         'pengarang' => $faker->name,
        //         'tanggal_publikasi' => $faker->date
        //     ]);
        // }
        // Glsap::table('glsap')->insert([
        //     'glsap' => Str::random(10),
        //     'costcenter' => Str::random(10),
        //     'namarekening' => Str::random(10),
        // ]);
    }
}
