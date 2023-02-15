<?php

namespace App\Http\Controllers\Lecturer;

use App\Models\Absent;
use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LecturerAttendanceController extends Controller
{
    //RickyJonnaMoryKembaren
    public function create(){
        $schedules = Schedule::where('lecturer_nidn', auth()->user()->nidn)->get();

        return view('dashboard.lecturer.attendance',[
            'page' => 'Dashboard Dosen',
            'schedules' => $schedules
        ]);
    }

    public function detail(Request $request){
        $week = $request->input('week');
        $schedule_id = $request->input('schedule_id');
        $absents = Absent::where('schedule_id', $schedule_id)->where('week',$week)->get();

        return view('dashboard.lecturer.attendancedetail',[
            'page' => 'Dashboard Dosen',
            'week' => $week,
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
        return back()->with('success','Absen Telah Di Perbaharui');
    }
}
