<?php

namespace App\Http\Controllers\Admin;

use App\Models\Absent;
use App\Models\Lecturer;
use App\Models\Schedule;
use App\Models\Dashboard;
use Illuminate\Http\Request;
use App\Exports\LecturerExport;
use App\Exports\ScheduleExport;
use App\Imports\LecturerImport;
use App\Imports\ScheduleImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class LecturerDashboardController extends Controller
{
    public function create()
    {
        $dashboardlecturer = Dashboard::where('usertype_id', 2)->first();
        return view('dashboard.admin.lecturersetting', [
            'page' => 'Laman Admin',
            'dashboardlecturer' => $dashboardlecturer
        ]);
    }

    public function update(Request $request)
    {
        $usertype_id = $request->input('usertype_id');
        $body = $request->input('body');

        $data = [
            'usertype_id' => $usertype_id,
            'body' => $body
        ];
        Dashboard::where('usertype_id', $usertype_id)->update($data);
        return back()->with('success', 'Dashboard Dosen Telah di Perbaharui');
    }

    public function lecturerexport()
    {
        return Excel::download(new LecturerExport, 'dosen.xlsx');
    }

    public function lecturerimport(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx'
        ]);

        try{
            Lecturer::truncate();
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $file->move('LecturerData', $filename);
            Excel::import(new LecturerImport, public_path('/LecturerData/' . $filename));
        } catch (\Exception $e){
            return back()->with('error', 'Data Excel Tidak Valid');
        }
        return back()->with('success', 'Data Dosen Telah Di Upload');
    }

    public function scheduleexport()
    {
        return Excel::download(new ScheduleExport, 'jadwal.xlsx');
    }

    public function scheduleimport(Request $request)
    {
        $request->validate([
            'schedule' => 'required|mimes:xlsx'
        ]);

        try{
            Schedule::truncate();
            $file = $request->file('schedule');
            $filename = $file->getClientOriginalName();
            $file->move('ScheduleData', $filename);
            Excel::import(new ScheduleImport, public_path('/ScheduleData/' . $filename));
            Absent::truncate();
            $schedules = Schedule::get()->all();
            foreach ($schedules as $schedule) {
                $students = $schedule->classroom->students;
                foreach ($students as $student) {
                    for ($i = 1; $i <= 14; $i++) {
                        Absent::create([
                            'schedule_id' => $schedule->id,
                            'student_id' => $student->id,
                            'absenttype_id' => null,
                            'week' => $i
                        ]);
                    }
                }
            }
        } catch (\Exception $e){
            return back()->with('error', 'Data Excel Tidak Valid');
        }
        return back()->with('success', 'Data Jadwal Telah Di Upload');
    }
}
