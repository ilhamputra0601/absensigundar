<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use App\Models\Dashboard;
use Illuminate\Http\Request;
use App\Exports\StudentExport;
use App\Imports\StudentImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class StudentDashboardController extends Controller
{
    public function create()
    {
        $dashboardstudent = Dashboard::where('usertype_id', 3)->first();
        return view('dashboard.admin.studentsetting', [
            'page' => 'Laman Admin',
            'dashboardstudent' => $dashboardstudent
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
        return back()->with('success', 'Dashboard Mahasiswa Telah di Perbaharui');
    }

    public function studentexport()
    {
        return Excel::download(new StudentExport, 'mahasiswa.xlsx');
    }

    public function studentimport(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx'
        ]);
        
        try{
            Student::truncate();
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $file->move('StudentData', $filename);
            Excel::import(new StudentImport, public_path('/StudentData/' . $filename));
        } catch (\Exception $e){
            return back()->with('error', 'Data Excel Tidak Valid');
        }
        return back()->with('success', 'Data Mahasiswa Telah Di Upload');
    }
}
