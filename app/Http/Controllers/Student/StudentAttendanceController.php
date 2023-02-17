<?php

namespace App\Http\Controllers\Student;

use App\Models\Absent;
use App\Models\Student;
use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentAttendanceController extends Controller
{
    public function index(){
        $student = Student::where('npm',auth()->user()->npm)->first();
        $schedules_id = Absent::where('student_id',$student->id)
                                ->groupBy('schedule_id')
                                ->pluck('schedule_id');
        $schedules = Schedule::whereIn('id',$schedules_id)->get();
        return view('dashboard.student.attendance',[
            'page' => 'Dashboard Mahasiswa',
            'schedules' => $schedules
            ]);
    }

    public function search(Request $request){
        $student = Student::where('npm',auth()->user()->npm)->first();
        $schedules_id = Absent::where('student_id',$student->id)
                                ->groupBy('schedule_id')
                                ->pluck('schedule_id');
        $schedules = Schedule::whereIn('id',$schedules_id)->get();
        $absents = Absent::where('schedule_id',$request->schedule_id)
                        ->where('student_id',$student->id)
                        ->get();
        return view('dashboard.student.attendancedetail',[
            'page' => 'Dashboard Mahasiswa',
            'schedules' => $schedules,
            'absents' => $absents
            ]);
    }
}
