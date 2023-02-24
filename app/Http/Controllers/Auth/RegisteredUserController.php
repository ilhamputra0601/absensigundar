<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Lecturer;
use App\Models\Student;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('login.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'usertype_id' => ['required', 'integer', 'max:20'],
            'nidn' => ['nullable', 'unique:'.User::class],
            'npm' => ['nullable','unique:'.User::class],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if($request->usertype_id == 2){
            $newuser = Lecturer::firstWhere('nidn',$request->nidn);
        } else if($request->usertype_id == 3){
            $newuser = Student::firstWhere('npm',$request->npm);
        }

        if(!$newuser){
            return back()->with('error','Data Anda Tidak Terdaftar');
        }{
            $user = User::create([
                'name' => $newuser->name,
                'usertype_id' => $request->usertype_id,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'nidn' => $request->nidn,
                'npm' => $request->npm
            ]);

            event(new Registered($user));

            Auth::login($user);

            if($user->usertype_id == 2){
                return redirect('/dashboardlecturer')->with('success','Akun Berhasil Terdaftar!');
            } else {
                return redirect('/dashboardstudent')->with('success','Akun Berhasil Terdaftar!');
            }
        }
    }
}
