<?php

namespace App\Http\Controllers\Lecturer;

use App\Models\Absent;
use App\Models\Student;
use App\Models\Schedule;
use App\Models\Threshold;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UasListController extends Controller
{
    public function create()
    {
        $schedules = Schedule::where('lecturer_nidn', auth()->user()->nidn)->get();

        return view('dashboard.lecturer.uaslist', [
            'page' => 'Laman Dosen',
            'schedules' => $schedules
        ]);
    }

    public function search(Request $request)
    {
        $schedules = Schedule::where('lecturer_nidn', auth()->user()->nidn)->get();
        $threshold = Threshold::where('id', 1)->first();
        $schedule_id = $request->input('schedule_id');
        $absents = Absent::where('schedule_id', $schedule_id)->get();
        $students_id = Absent::where('schedule_id', $schedule_id)
            ->whereIn('absenttype_id', [1, 3, 4])
            ->whereIn('week', range(1, 14))
            ->groupBy('student_id')
            ->havingRaw("
                            (SUM(CASE WHEN absenttype_id = 1 THEN 1 ELSE 0 END) +
                            LEAST(SUM(CASE WHEN absenttype_id = 3 THEN 1 ELSE 0 END), 2) +
                            LEAST(SUM(CASE WHEN absenttype_id = 4 THEN 1 ELSE 0 END), 3)) / 14 * 100 >= $threshold->value")
            ->pluck('student_id');
        $students = Student::whereIn('id', $students_id)->get();
        $fail_id = Absent::where('schedule_id', $schedule_id)
            ->whereIn('absenttype_id', [1, 3, 4])
            ->whereIn('week', range(1, 14))
            ->groupBy('student_id')
            ->havingRaw("
                            (SUM(CASE WHEN absenttype_id = 1 THEN 1 ELSE 0 END) +
                            LEAST(SUM(CASE WHEN absenttype_id = 3 THEN 1 ELSE 0 END), 2) +
                            LEAST(SUM(CASE WHEN absenttype_id = 4 THEN 1 ELSE 0 END), 3)) / 14 * 100 < $threshold->value")
            ->pluck('student_id');
        $students_fail = Student::whereIn('id', $fail_id)->get();
        return view('dashboard.lecturer.uaslistdetail', [
            'page' => 'Laman Dosen',
            'schedules' => $schedules,
            'absents' => $absents,
            'students' => $students,
            'students_fail' => $students_fail
        ]);
    }

    public function print(Request $request)
    {
        $schedule = Schedule::where('id', $request->input('schedule_id'))->first();
        $table = Absent::where('schedule_id', $schedule->id)
            ->leftjoin('absenttypes', 'absents.absenttype_id', '=', 'absenttypes.id')
            ->join('students', 'absents.student_id', '=', 'students.id')
            ->select('students.npm', 'students.name')
            ->addSelect(DB::raw("MAX(CASE WHEN absents.week = 1 THEN IFNULL(absenttypes.name, '') ELSE NULL END) AS 'week1'"))
            ->addSelect(DB::raw("MAX(CASE WHEN absents.week = 2 THEN IFNULL(absenttypes.name, '') ELSE NULL END) AS 'week2'"))
            ->addSelect(DB::raw("MAX(CASE WHEN absents.week = 3 THEN IFNULL(absenttypes.name, '') ELSE NULL END) AS 'week3'"))
            ->addSelect(DB::raw("MAX(CASE WHEN absents.week = 4 THEN IFNULL(absenttypes.name, '') ELSE NULL END) AS 'week4'"))
            ->addSelect(DB::raw("MAX(CASE WHEN absents.week = 5 THEN IFNULL(absenttypes.name, '') ELSE NULL END) AS 'week5'"))
            ->addSelect(DB::raw("MAX(CASE WHEN absents.week = 6 THEN IFNULL(absenttypes.name, '') ELSE NULL END) AS 'week6'"))
            ->addSelect(DB::raw("MAX(CASE WHEN absents.week = 7 THEN IFNULL(absenttypes.name, '') ELSE NULL END) AS 'week7'"))
            ->addSelect(DB::raw("MAX(CASE WHEN absents.week = 8 THEN IFNULL(absenttypes.name, '') ELSE NULL END) AS 'week8'"))
            ->addSelect(DB::raw("MAX(CASE WHEN absents.week = 9 THEN IFNULL(absenttypes.name, '') ELSE NULL END) AS 'week9'"))
            ->addSelect(DB::raw("MAX(CASE WHEN absents.week = 10 THEN IFNULL(absenttypes.name, '') ELSE NULL END) AS 'week10'"))
            ->addSelect(DB::raw("MAX(CASE WHEN absents.week = 11 THEN IFNULL(absenttypes.name, '') ELSE NULL END) AS 'week11'"))
            ->addSelect(DB::raw("MAX(CASE WHEN absents.week = 12 THEN IFNULL(absenttypes.name, '') ELSE NULL END) AS 'week12'"))
            ->addSelect(DB::raw("MAX(CASE WHEN absents.week = 13 THEN IFNULL(absenttypes.name, '') ELSE NULL END) AS 'week13'"))
            ->addSelect(DB::raw("MAX(CASE WHEN absents.week = 14 THEN IFNULL(absenttypes.name, '') ELSE NULL END) AS 'week14'"))
            ->addSelect(DB::raw("
                (SUM(CASE WHEN absents.absenttype_id = 1 THEN 1 ELSE 0 END)
                + LEAST(SUM(CASE WHEN absenttype_id = 3 THEN 1 ELSE 0 END), 2) +
                LEAST(SUM(CASE WHEN absenttype_id = 4 THEN 1 ELSE 0 END), 3)) / 14 * 100 AS `percentage`"))
            ->groupBy('students.npm', 'students.name')
            ->get();
        // dd($table);

        return view('dashboard.lecturer.printattendanceuas', [
            'page' => "Laman Dosen",
            'schedule' => $schedule,
            'table' => $table
        ]);
    }
}
