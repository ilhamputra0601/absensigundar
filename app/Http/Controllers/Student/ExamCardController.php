<?php

namespace App\Http\Controllers\Student;

use App\Models\Absent;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Threshold;

class ExamCardController extends Controller
{
    public function index(){
        $threshold = Threshold::where('id',1)->first();
        $student = Student::where('npm',auth()->user()->npm)->first();
        $schedules_id = Absent::where('student_id',$student->id)
                                ->whereIn('absenttype_id', [1,3,4])
                                ->whereIn('week', range(1, 10))
                                ->groupBy('schedule_id')
                                ->havingRaw("(SUM(CASE WHEN absenttype_id = 1 THEN 1 ELSE 0 END) +
                                LEAST(SUM(CASE WHEN absenttype_id = 3 THEN 1 ELSE 0 END), 2) +
                                LEAST(SUM(CASE WHEN absenttype_id = 4 THEN 1 ELSE 0 END), 3)) / 10 * 100 >= $threshold->value")
                                ->pluck('schedule_id');
        $schedules = Schedule::whereIn('id',$schedules_id)->get();
        $fail_id = Absent::where('student_id',$student->id)
                            ->whereIn('absenttype_id', [1,3,4])
                            ->whereIn('week', range(1, 10))
                            ->groupBy('schedule_id')
                            ->havingRaw("(SUM(CASE WHEN absenttype_id = 1 THEN 1 ELSE 0 END) +
                            LEAST(SUM(CASE WHEN absenttype_id = 3 THEN 1 ELSE 0 END), 2) +
                            LEAST(SUM(CASE WHEN absenttype_id = 4 THEN 1 ELSE 0 END), 3)) / 10 * 100 < $threshold->value")
                            ->pluck('schedule_id');
        $schedules_fail = Schedule::whereIn('id',$fail_id)->get();
        return view('dashboard.student.utscard',[
            'page' => 'Laman Mahasiswa',
            'student' => $student,
            'schedules' => $schedules,
            'schedules_fail' => $schedules_fail
        ]);
    }

    public function index2(){
        $threshold = Threshold::where('id',1)->first();
        $student = Student::where('npm',auth()->user()->npm)->first();
        $schedules_id = Absent::where('student_id',$student->id)
                                ->whereIn('absenttype_id', [1,3,4])
                                ->whereIn('week', range(1, 14))
                                ->groupBy('schedule_id')
                                ->havingRaw("(SUM(CASE WHEN absenttype_id = 1 THEN 1 ELSE 0 END) +
                                LEAST(SUM(CASE WHEN absenttype_id = 3 THEN 1 ELSE 0 END), 2) +
                                LEAST(SUM(CASE WHEN absenttype_id = 4 THEN 1 ELSE 0 END), 3)) / 14 * 100 >= $threshold->value")
                                ->pluck('schedule_id');
        $schedules = Schedule::whereIn('id',$schedules_id)->get();
        $fail_id = Absent::where('student_id',$student->id)
                            ->whereIn('absenttype_id', [1,3,4])
                            ->whereIn('week', range(1, 14))
                            ->groupBy('schedule_id')
                            ->havingRaw("(SUM(CASE WHEN absenttype_id = 1 THEN 1 ELSE 0 END) +
                            LEAST(SUM(CASE WHEN absenttype_id = 3 THEN 1 ELSE 0 END), 2) +
                            LEAST(SUM(CASE WHEN absenttype_id = 4 THEN 1 ELSE 0 END), 3)) / 14 * 100 < $threshold->value")
                            ->pluck('schedule_id');
        $schedules_fail = Schedule::whereIn('id',$fail_id)->get();
        return view('dashboard.student.uascard',[
            'page' => 'Laman Mahasiswa',
            'student' => $student,
            'schedules' => $schedules,
            'schedules_fail' => $schedules_fail
        ]);
    }
}
