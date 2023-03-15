<?php

namespace Database\Seeders;

use App\Models\Publiser;
use Illuminate\Database\Seeder;

class PubliserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Publiser::Create([
            'name' => 'Republika Penerbit',
            'email' => 'redaksi@bukurepublika.id',
            'alamat' => 'Jl. Kavling Polri Blok I No. 65, Jagakarsa, Jakarta Selatan, 12620'
        ]);

        Publiser::Create([
            'name' => 'mediakita',
            'email' => 'redaksi@mediakita.com',
            'alamat' => 'Jl. H. Montong No. 57, Ciganjur, Jagakarsa, Jakarta Selatan 12630'
        ]);

        Publiser::Create([
            'name' => 'GagasMedia',
            'email' => 'redaksi@gagasmedia.net',
            'alamat' => 'Jl. H. Montong No. 57 Ciganjur, Jagakarsa 12360'
        ]);

        Publiser::Create([
            'name' => 'Immortal Publishing',
            'email' => 'cs@shiramedia.com',
            'alamat' => 'Jl. Kavling Polri Blok I No. 65, Jagakarsa, Jakarta Selatan, 12620'
        ]);
    }
}
