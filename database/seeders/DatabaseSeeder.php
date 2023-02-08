<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Student;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Lecturer;
use App\Models\Usertype;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Usertype::create([
            'type' => 'admin'
        ]);
        Usertype::create([
            'type' => 'lecturer'
        ]);
        Usertype::create([
            'type' => 'student'
        ]);

        User::create([
            'usertype_id' => 1,
            'name' => 'Ricky Admin',
            'email' => 'ricky.admin@gmail.com',
            'password' => Hash::make('12345678')
        ]);

        Lecturer::create([
            'NIDN' => '1234567890',
            'name' => 'Ricky Dosen'
        ]);

        Student::create([
            'npm' => '56418102',
            'name' => 'Ricky Student'
        ]);
    }
}
