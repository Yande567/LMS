<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Roles::create([
            'name' => 'Adminstrator',
        ]);

        Roles::create([
            'name' => 'Librarian',
        ]);

        Roles::create([
            'name' => 'Student',
        ]);
    }
}
