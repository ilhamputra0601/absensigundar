<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller

{
    public function create(){
        return view('dashboard.profile');
    }

    public function update(Request $request){
        $newemail = $request->validate([
            'email' => 'required|unique:users'
        ]);
        User::where('id',auth()->user()->id)->update($newemail);
        return back();
    }
}
