<?php

namespace App\Http\Controllers\Lecturer;

use App\Models\Absent;
use App\Models\Course;
use App\Models\Lecturer;
use App\Models\Schedule;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LecturerAttendanceController extends Controller
{
    public function create(){
        $lecturer = Lecturer::where('nidn', auth()->user()->nidn)->first();
        $schedules = Schedule::where('lecturer_nidn', $lecturer->nidn)->get();

        return view('dashboard.lecturer.attendance',[
            'page' => 'Dashboard Dosen',
            'schedules' => $schedules
            ]);
    }

    public function detail(Request $request){
        $schedule_id = $request->input('schedule_id');
        $week = $request->input('week');

        $schedule = Schedule::where('id', $schedule_id)->first();
        $classroom_name = $schedule->classroom_name;
        $classroom = Classroom::where('name',$classroom_name)->first();
        $course = Course::where('name', $schedule->course_name)->first();
        $absents = Absent::where('schedule_id', $schedule->id)->where('week',$week)->get();

        return view('dashboard.lecturer.attendancedetail',[
            'page' => 'Dashboard Dosen',
            'week' => $week,
            'classroom' => $classroom,
            'course' => $course,
            'location_name' => $schedule->location_name,
            'time_description' => $schedule->time_description,
            'absents' => $absents
        ]);
    }

    public function change(Request $request){
        $week = $request->input('week');
        dd($request);
    }
}
