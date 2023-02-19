<?php

namespace App\Http\Controllers\Lecturer;

use App\Models\Absent;
use App\Models\Student;
use App\Models\Schedule;
use App\Models\Threshold;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UasListController extends Controller
{
    public function create(){
        $schedules = Schedule::where('lecturer_nidn', auth()->user()->nidn)->get();

        return view('dashboard.lecturer.uaslist',[
            'page' => 'Dashboard Dosen',
            'schedules' => $schedules
            ]);
    }

    public function search(Request $request){
        $threshold = Threshold::where('id',2)->first();
        $schedule_id = $request->input('schedule_id');
        $absents = Absent::where('schedule_id',$schedule_id)->get();
        $students_id = Absent::where('schedule_id',$schedule_id)
                            ->whereIn('absenttype_id', [1,3,4])
                            ->whereIn('week', range(1, 14))
                            ->groupBy('student_id')
                            ->havingRaw("
                            SUM(CASE WHEN absenttype_id = 1 THEN 1 ELSE 0 END) +
                            LEAST(SUM(CASE WHEN absenttype_id = 3 THEN 1 ELSE 0 END), 2) +
                            LEAST(SUM(CASE WHEN absenttype_id = 4 THEN 1 ELSE 0 END), 3) >= $threshold->value")
                            ->pluck('student_id');
        $students = Student::whereIn('id',$students_id)->get();
        $fail_id = Absent::where('schedule_id',$schedule_id)
                            ->whereIn('absenttype_id', [1,3,4])
                            ->whereIn('week', range(1, 14))
                            ->groupBy('student_id')
                            ->havingRaw("
                            SUM(CASE WHEN absenttype_id = 1 THEN 1 ELSE 0 END) +
                            LEAST(SUM(CASE WHEN absenttype_id = 3 THEN 1 ELSE 0 END), 2) +
                            LEAST(SUM(CASE WHEN absenttype_id = 4 THEN 1 ELSE 0 END), 3) < $threshold->value")
                            ->pluck('student_id');
        $students_fail = Student::whereIn('id',$fail_id)->get();
        return view('dashboard.lecturer.uaslistdetail',[
            'page' => 'Dashboard Dosen',
            'absents' => $absents,
            'students' => $students,
            'students_fail' => $students_fail
        ]);
    }
}
