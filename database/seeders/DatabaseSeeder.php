<?php

namespace Database\Seeders;

use App\Models\Time;
use App\Models\User;
use App\Models\Major;
use App\Models\Absent;
use App\Models\Course;
use App\Models\Faculty;
use App\Models\Student;
use App\Models\Lecturer;
use App\Models\Location;
use App\Models\Schedule;
use App\Models\Usertype;
use App\Models\Classroom;
use App\Models\Absenttype;
use App\Models\Dashboard;
use App\Models\Threshold;
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

        //dummy excel
        Lecturer::create([
            'nidn' => '1234567890',
            'name' => 'Ricky Dosen'
        ]);

        //dummy excel
        Student::create([
            'classroom_name' => '1IA01',
            'npm' => '56418102',
            'name' => 'Ricky Student'
        ]);

        Student::create([
            'classroom_name' => '1IA01',
            'npm' => '56418103',
            'name' => 'Ricky Student2'
        ]);

        Student::create([
            'classroom_name' => '1IA01',
            'npm' => '56418104',
            'name' => 'Ricky Student3'
        ]);

        User::create([
            'usertype_id' => 1,
            'name' => 'Ricky Admin',
            'email' => 'ricky.admin@gmail.com',
            'password' => Hash::make('12345678')
        ]);

        User::create([
            'usertype_id' => 2,
            'name' => 'Ricky Dosen',
            'email' => 'ricky.dosen@gmail.com',
            'password' => Hash::make('12345678'),
            'nidn' => '1234567890'
        ]);

        User::create([
            'usertype_id' => 3,
            'name' => 'Ricky Mahasiswa',
            'email' => 'ricky.mahasiswa@gmail.com',
            'password' => Hash::make('12345678'),
            'npm' => '56418102'
        ]);

        for ($i = 1; $i <= 28; $i++) {
            $region = null;

            if ($i <= 20) {
                $region = 'Depok';
            } elseif ($i <= 27) {
                $region = 'Kalimalang';
            } else {
                $region = 'Cengkareng';
            }

            Classroom::insert([
                'name' => '1IA' . str_pad($i, 2, '0', STR_PAD_LEFT),
                'region' => $region,
                'major_id' => 1
            ]);
        }

        for ($i = 1; $i <= 28; $i++) {
            $region = null;

            if ($i <= 19) {
                $region = 'Depok';
            } elseif ($i <= 26) {
                $region = 'Kalimalang';
            } else {
                $region = 'Cengkareng';
            }

            Classroom::insert([
                'name' => '2IA' . str_pad($i, 2, '0', STR_PAD_LEFT),
                'region' => $region,
                'major_id' => 1
            ]);
        }

        for ($i = 1; $i <= 21; $i++) {
            $region = null;

            if ($i <= 15) {
                $region = 'Depok';
            } elseif ($i <= 20) {
                $region = 'Kalimalang';
            } else {
                $region = 'Cengkareng';
            }

            Classroom::insert([
                'name' => '3IA' . str_pad($i, 2, '0', STR_PAD_LEFT),
                'region' => $region,
                'major_id' => 1
            ]);
        }

        for ($i = 1; $i <= 23; $i++) {
            $region = null;
            if ($i <= 16) {
                $region = 'Depok';
            } elseif ($i <= 22) {
                $region = 'Kalimalang';
            } else {
                $region = 'Cengkareng';
            }
            Classroom::insert([
                'name' => '4IA' . str_pad($i, 2, '0', STR_PAD_LEFT),
                'region' => $region,
                'major_id' => 1
            ]);
        }

        Faculty::create([
            'name' => 'Teknik Industri'
        ]);

        Major::create([
            'name' => 'Informatika',
            'faculty_id' => 1
        ]);

        Course::create([
            'major_id' => 1,
            'coursecode' => 'HM045101',
            'name' => 'Ilmu Budaya Dasar',
            'academicyear' => '2012',
            'SKS' => '1',
            'semester' => 1
        ]);

        Location::create([
            'name' => 'Kampus E'
        ]);

        Time::create([
            'timecode' => 'SEN1',
            'description' => 'Senin 08.00 - 09.00'
        ]);

        //dummy excel
        Schedule::create([
            'classroom_name' => '1IA01',
            'course_name' => 'Ilmu Budaya Dasar',
            'location_name' => 'Kampus D',
            'time_description' => 'Senin 08.00 - 09.00',
            'lecturer_nidn' => '1234567890'
        ]);

        Absenttype::create([
            'name' => 'Hadir'
        ]);
        Absenttype::create([
            'name' => 'Alpa'
        ]);
        Absenttype::create([
            'name' => 'Izin'
        ]);
        Absenttype::create([
            'name' => 'Sakit'
        ]);

        for($i=1;$i<=14; $i++){
            Absent::create([
                'schedule_id' => 1,
                'student_id' => 1,
                'absenttype_id' => null,
                'week' => $i
            ]);
        }

        for($i=1;$i<=14; $i++){
            Absent::create([
                'schedule_id' => 1,
                'student_id' => 2,
                'absenttype_id' => null,
                'week' => $i
            ]);
        }

        for($i=1;$i<=14; $i++){
            Absent::create([
                'schedule_id' => 1,
                'student_id' => 3,
                'absenttype_id' => null,
                'week' => $i
            ]);
        }

        Dashboard::create([
            'usertype_id' => 2,
            'body' => 'Ini Dashboard Dosen'
        ]);
        Dashboard::create([
            'usertype_id' => 3,
            'body' => 'Ini Dashboard Mahasiswa'
        ]);

        Threshold::create([
            'name' => 'UTS',
            'value' => '7'
        ]);

        Threshold::create([
            'name' => 'UAS',
            'value' => '10'
        ]);
    }
}
