<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Threshold;
use Illuminate\Http\Request;

class AdminMinimumAttendanceController extends Controller
{
    public function create()
    {
        return view(
            'dashboard.admin.minimumattendance',
            [
                'page' => 'Laman Admin'
            ]
        );
    }

    public function insert(Request $request)
    {
        $value = $request->input('value');
        Threshold::where('id', 1)->update(['value' => $value]);
        return back()->with('success', 'Minimal Presensi Telah Di Update!');
    }
}
