<?php

namespace App\Http\Controllers\Admin;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LecturerExport;
use App\Imports\LecturerImport;
use App\Models\Dashboard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LecturerDashboardController extends Controller
{
    public function create(){
        $dashboardlecturer = Dashboard::where('usertype_id',2)->first();
        return view('dashboard.admin.lecturersetting',[
            'dashboardlecturer' => $dashboardlecturer
        ]);
    }

    public function update(Request $request){
        $usertype_id = $request->input('usertype_id');
        $body = $request->input('body');

        $data = [
            'usertype_id' => $usertype_id,
            'body' => $body
        ];
        Dashboard::where('usertype_id',$usertype_id)->update($data);
        return back()->with('success','Dashboard Dosen Telah di Perbaharui');
    }

    public function lecturerexport(){
        return Excel::download(new LecturerExport,'dosen.xlsx');
    }

    public function lecturerimport(Request $request){
        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $file->move('LecturerData',$filename);

        Excel::import(new LecturerImport,public_path('/LecturerData/'.$filename));
        return back()->with('success','Data Dosen Telah Di Upload');
    }
}
