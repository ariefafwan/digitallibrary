<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::Create([
            'name' => 'admin',
            'role_id' => '1',
            'nippos' => '180180023',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password')
        ]);

        User::Create([
            'name' => 'pemimpin',
            'role_id' => '2',
            'nippos' => '180180013',
            'email' => 'pemimpin@gmail.com',
            'password' => Hash::make('password')
        ]);

        User::Create([
            'name' => 'user',
            'role_id' => '3',
            'divisi_id' => '1',
            'nippos' => '180180056',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password')
        ]);
    }
}
