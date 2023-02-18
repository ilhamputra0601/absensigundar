<?php

namespace App\Http\Controllers\Admin;

use App\Models\Threshold;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminUasController extends Controller
{
    public function create(){
        return view('dashboard.admin.uas',
            [
            'page' => 'Dashboard Admin'
            ]);
    }

    public function insert(Request $request){
        $value = $request->input('value');
        Threshold::where('id',2)->update(['value' => $value]);
        return back()->with('success','Minimal Absen Telah Di Update!');
    }
}
