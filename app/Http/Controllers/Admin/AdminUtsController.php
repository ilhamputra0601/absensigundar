<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Threshold;
use Illuminate\Http\Request;

class AdminUtsController extends Controller
{
    public function create(){
        return view('dashboard.admin.uts',
            [
            'page' => 'Dashboard Admin'
            ]);
    }

    public function insert(Request $request){
        $value = $request->input('value');
        Threshold::where('id',1)->update(['value' => $value]);
        return back()->with('success','Minimal Absen Telah Di Update!');
    }
}
