<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kategori::Create([
            'name' => 'Fiksi',
        ]);

        Kategori::Create([
            'name' => 'Drama',
        ]);

    }
}
