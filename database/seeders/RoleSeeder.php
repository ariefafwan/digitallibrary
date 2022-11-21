<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::Create([
            'name' => 'admin',
        ]);
        
        Role::Create([
            'name' => 'pemimpin',
        ]);

        Role::Create([
            'name' => 'user',
        ]);

    }
}
