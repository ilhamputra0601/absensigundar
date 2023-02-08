<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__.'/auth.php';

Route::get('/', function () {
    return redirect('/login');
});

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });


//admin
Route::get('/dashboardadmin', function () {
    return view('dashboard.admin.dashboard',
        [
        'page' => 'Dashboard Admin'
        ]);
})->middleware(['auth', 'usertypecheck:admin']);
Route::get('/dashboardadmin/editdashboardlecturer', function () {
    return view('dashboard.admin.editdashboardlecturer',
        [
        'page' => 'Dashboard Admin'
        ]);
})->middleware(['auth', 'usertypecheck:admin']);
Route::get('/dashboardadmin/editdashboardstudent', function () {
    return view('dashboard.admin.editdashboardstudent',
        [
        'page' => 'Dashboard Admin'
        ]);
})->middleware(['auth', 'usertypecheck:admin']);
Route::get('/dashboardadmin/uts', function () {
    return view('dashboard.admin.uts',
        [
        'page' => 'Dashboard Admin'
        ]);
})->middleware(['auth', 'usertypecheck:admin']);
Route::get('/dashboardadmin/uas', function () {
    return view('dashboard.admin.uas',
        [
        'page' => 'Dashboard Admin'
        ]);
})->middleware(['auth', 'usertypecheck:admin']);
Route::get('/dashboardadmin/profile', function () {
    return view('dashboard.admin.profile',
        [
        'page' => 'Dashboard Admin'
    ]);
})->middleware(['auth', 'usertypecheck:admin']);
Route::post('/dashboardadmin/profile', [ProfileController::class,'update'])->middleware(['auth', 'usertypecheck:admin']);


//dosen
Route::get('/dashboardlecturer', function () {
    return view('dashboard.lecturer.dashboard',[
        'page' => 'Dashboard Dosen'
        ]);
})->middleware(['auth', 'usertypecheck:lecturer']);
Route::get('/dashboardlecturer/attendance', function () {
    return view('dashboard.lecturer.attendance',[
        'page' => 'Dashboard Dosen'
        ]);
})->middleware(['auth', 'usertypecheck:lecturer']);
Route::get('/dashboardlecturer/utslist', function () {
    return view('dashboard.lecturer.utslist',[
        'page' => 'Dashboard Dosen'
        ]);
})->middleware(['auth', 'usertypecheck:lecturer']);
Route::get('/dashboardlecturer/profile', function () {
    return view('dashboard.lecturer.profile',
        [
        'page' => 'Dashboard Dosen'
    ]);
})->middleware(['auth', 'usertypecheck:lecturer']);
Route::post('/dashboardlecturer/profile', [ProfileController::class,'update'])->middleware(['auth', 'usertypecheck:lecturer']);

//mahasiswa
Route::get('/dashboardstudent', function () {
    return view('dashboard.student.dashboard',[
        'page' => 'Dashboard Mahasiswa'
        ]);
})->middleware(['auth', 'usertypecheck:student']);
Route::get('/dashboardstudent/attendance', function () {
    return view('dashboard.student.attendance',[
        'page' => 'Dashboard Mahasiswa'
        ]);
})->middleware(['auth', 'usertypecheck:student']);
Route::get('/dashboardstudent/examcard', function () {
    return view('dashboard.student.examcard',[
        'page' => 'Dashboard Mahasiswa'
        ]);
})->middleware(['auth', 'usertypecheck:student']);
Route::get('/dashboardstudent/profile', function () {
    return view('dashboard.student.profile',
        [
        'page' => 'Dashboard Mahasiswa'
    ]);
})->middleware(['auth', 'usertypecheck:student']);
Route::post('/dashboardstudent/profile', [ProfileController::class,'update'])->middleware(['auth', 'usertypecheck:student']);





