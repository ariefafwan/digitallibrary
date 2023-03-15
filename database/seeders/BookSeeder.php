<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        Book::Create([
            'kodebuku' => 'BC' . time() . rand(100, 999),
            'name' => 'Si Anak Pintar',
            'kategori_id' => '1',
            'author_id' => '1',
            'penerbit_id' => '1',
            'deskripsi' => $faker->text,
            'img' => 'si anak pintar.jpg',
            'tahunterbit' => '2018',
            'isbn' => '978-602-5734-50-2',
            'stock' => '2'
        ]);

        Book::Create([
            'kodebuku' => 'BC' . time() . rand(100, 999),
            'name' => 'Kudasai',
            'kategori_id' => '1',
            'author_id' => '2',
            'penerbit_id' => '2',
            'deskripsi' => $faker->text,
            'img' => 'kudasai.jpg',
            'tahunterbit' => '2019',
            'isbn' => '978-979-7945-97-8',
            'stock' => '2'
        ]);

        Book::Create([
            'kodebuku' => 'BC' . time() . rand(100, 999),
            'name' => 'Kata',
            'kategori_id' => '2',
            'author_id' => '3',
            'penerbit_id' => '3',
            'deskripsi' => $faker->text,
            'img' => 'kata.jpg',
            'tahunterbit' => '2018',
            'isbn' => '978-979-780-932-4',
            'stock' => '2'
        ]);

        Book::Create([
            'kodebuku' => 'BC' . time() . rand(100, 999),
            'name' => 'The Adventures of Sherlock Holmes',
            'kategori_id' => '1',
            'author_id' => '4',
            'penerbit_id' => '4',
            'deskripsi' => $faker->text,
            'img' => 'the adventures of sherlock holmes.jpg',
            'tahunterbit' => '2019',
            'isbn' => '978-602-5868-8',
            'stock' => '2'
        ]);
    }
}
