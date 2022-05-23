<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\LibrarianInfo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LibrarianRegistrationInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role_id' => 2,
            'email' => 'lib.user@admin.com',
            'password' => Hash::make('libUserPassword'),
        ]);

        LibrarianInfo::create([
            'first_name' => 'test',
            'last_name' => 'user',
            'contact' => '0326987562',
            'gender' => 'Male',
            'user_id'=> 2,
        ]);
    }
}
