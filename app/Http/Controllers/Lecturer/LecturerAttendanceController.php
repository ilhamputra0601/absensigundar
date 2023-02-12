<?php

namespace App\Http\Controllers\Lecturer;

use App\Models\Absent;
use App\Models\Course;
use App\Models\Lecturer;
use App\Models\Schedule;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\Console\Input\Input;

class LecturerAttendanceController extends Controller
{
    // RickyJonnaMoryKembaren
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
        $course = Course::where('name', $schedule->course_name)->first();
        $dummyabsent = Absent::where('schedule_id', $schedule->id)->where('week',$week)->first();
        $absents = Absent::where('schedule_id', $schedule->id)->where('week',$week)->get();

        return view('dashboard.lecturer.attendancedetail',[
            'page' => 'Dashboard Dosen',
            'week' => $week,
            'course' => $course,
            'dummyabsent' => $dummyabsent,
            'absents' => $absents
        ]);
    }

    public function change(Request $request){
        $week = $request->input('week');
        $attendance = $request->input('attendance');
        $attendancelength = count($attendance);
        $schedule_id = $request->input('schedule_id');

        foreach($attendance as $key => $value){
            for ($i=0; $i<$attendancelength; $i++){
                $data = [
                    'student_id' => $key,
                    'absenttype_id' => $value
                    ];
                Absent::where('schedule_id',$schedule_id)->where('student_id',$key)->where('week',$week)->update($data);
            }
            $attendance = array_splice($attendance,1);
        };
        return back()->with('success','Absen Telah Di Update');
    }
}
