<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Author::Create([
            'name' => 'Tere Liye',
        ]);

        Author::Create([
            'name' => 'Brian Khrisna',
        ]);

        Author::Create([
            'name' => 'Rintik Sedu',
        ]);

        Author::Create([
            'name' => 'Arthur Conan Doyle',
        ]);
    }
}
