<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Students;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role_id' => 3,
            'email' => 'student.user@lib.com',
            'password' => Hash::make('studentUserPassword'),
        ]);

        $student_id = '2022284562';
        
        Students::create([
            'first_name' => 'Student',
            'last_name' => 'Test',
            'contact' => '0326987562',
            'gender' => 'Male',
            'user_id'=> 3,
            'student_id' => $student_id,
        ]);
    }
}
