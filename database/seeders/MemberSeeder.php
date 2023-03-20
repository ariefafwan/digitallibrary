<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Member::Create([
            'name' => 'member',
            'user_id' => '3',
            'nmrhp' => '08261281218',
            'alamat' => 'Lorem Ipsum Street',
            'profile_img' => 'profil_img.jpg',
            'date_of_birth' => '2000-09-27'
        ]);
    }
}
