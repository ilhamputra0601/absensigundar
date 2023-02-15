<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dashboard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentDashboardController extends Controller
{
    public function create(){
        $dashboardstudent = Dashboard::where('usertype_id',3)->first();
        return view('dashboard.admin.studentsetting',[
            'dashboardstudent' => $dashboardstudent
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
        return back()->with('success','Dashboard Mahasiswa Telah di Perbaharui');
    }
}
