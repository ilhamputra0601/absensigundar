<?php

namespace App\Http\Controllers\Lecturer;

use App\Models\Absent;
use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Exports\AttendanceExport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class LecturerAttendanceController extends Controller
{
    public function create()
    {
        $schedules = Schedule::where('lecturer_nidn', auth()->user()->nidn)->get();

        return view('dashboard.lecturer.attendance', [
            'page' => 'Laman Dosen',
            'schedules' => $schedules
        ]);
    }

    public function detail(Request $request)
    {
        $week = $request->input('week');
        $schedule_id = $request->input('schedule_id');
        $schedules = Schedule::where('lecturer_nidn', auth()->user()->nidn)->get();
        $absents = Absent::where('schedule_id', $schedule_id)->where('week', $week)->get();

        return view('dashboard.lecturer.attendancedetail', [
            'page' => 'Laman Dosen',
            'week' => $week,
            'schedules' => $schedules,
            'absents' => $absents
        ]);
    }

    public function change(Request $request)
    {
        $week = $request->input('week');
        $attendance = $request->input('attendance');
        $attendancelength = count($attendance);
        $schedule_id = $request->input('schedule_id');

        foreach ($attendance as $key => $value) {
            for ($i = 0; $i < $attendancelength; $i++) {
                $data = [
                    'student_id' => $key,
                    'absenttype_id' => $value
                ];
                Absent::where('schedule_id', $schedule_id)->where('student_id', $key)->where('week', $week)->update($data);
            }
            $attendance = array_splice($attendance, 1);
        };
        return back()->with('success', 'Absen Telah Di Perbaharui');
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

        return view('dashboard.lecturer.exportattendance', [
            'page' => "Laman Dosen",
            'schedule' => $schedule,
            'table' => $table
        ]);
    }

    public function export(Request $request)
    {
        $schedule = Schedule::where('id', $request->input('schedule_id'))->first();
        $data = Absent::where('schedule_id', $schedule->id)
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

        $attendanceexport = new AttendanceExport($data);
        return Excel::download($attendanceexport, 'attendance.xlsx');
    }
}
