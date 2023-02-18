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
        $student = Student::where('npm',auth()->user()->npm)->first();
        $schedules_id = Absent::where('student_id',$student->id)
                                ->where('absenttype_id', 1)
                                ->whereIn('week', range(1, 10))
                                ->groupBy('schedule_id')
                                ->havingRaw("COUNT(id) >= 7")
                                ->pluck('schedule_id');
        $schedules = Schedule::whereIn('id',$schedules_id)->get();
        $fail_id = Absent::where('student_id',$student->id)
                            ->where('absenttype_id', 1)
                            ->whereIn('week', range(1, 10))
                            ->groupBy('schedule_id')
                            ->havingRaw('COUNT(id) < 7')
                            ->pluck('schedule_id');
        $schedules_fail = Schedule::whereIn('id',$fail_id)->get();
        return view('dashboard.student.examcard',[
            'page' => 'Dashboard Mahasiswa',
            'student' => $student,
            'schedules' => $schedules,
            'schedules_fail' => $schedules_fail
        ]);
    }
}
