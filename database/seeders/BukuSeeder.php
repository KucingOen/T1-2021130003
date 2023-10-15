<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        $category = ['Uncategorized', 'Sci-Fi', 'Novel', 'History', 'Biography', 'Romance', 'Education', 'Culinary', 'Comic'];

        // 15 data buku dummy
        for ($i = 0; $i < 15; $i++) {
            //isbn, 13 digit
            $isbn = $faker->numberBetween(1000000000000, 9999999999999);
            //judul, 4 kata
            $judulBuku = $faker->sentence(4);
            //jumlah halaman antara 0 - 500
            $halaman = $faker->numberBetween(0, 500);
            //kategori
            $kategori = $faker->randomElement($category);
            //nama penerbit, 3 kata
            $penerbit = $faker->sentence(3);
            $created_at = $faker->dateTimeBetween('-10 days', 'now');

            DB::table('articles')->insert([
                'isbn' => $isbn,
                'judul' => $judulBuku,
                'halaman' => $halaman,
                'kategori' => $kategori,
                'penerbit' => $penerbit,
                'created_at' => $created_at,
                'updated_at' => $created_at,
            ]);
        }
    }
}
