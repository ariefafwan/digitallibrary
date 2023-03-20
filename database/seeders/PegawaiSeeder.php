<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pegawai::Create([
            'name' => 'pegawai',
            'user_id' => '2',
            'nmrhp' => '08261281218',
            'alamat' => 'Lorem Ipsum Street',
            'profile_img' => 'profil_img.jpg',
            'date_of_birth' => '2000-09-27'
        ]);
    }
}
