<?php

use App\Models\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\LecturerDashboardController;
use App\Http\Controllers\Admin\StudentDashboardController;
use App\Http\Controllers\Lecturer\LecturerAttendanceController;
use App\Http\Controllers\Lecturer\UtsListController;
use App\Http\Controllers\Student\ExamCardController;

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

Route::get('/dashboard/profile', [ProfileController::class,'create'])->middleware(['auth']);
Route::post('/dashboard/profile', [ProfileController::class,'update'])->middleware(['auth']);

//admin
Route::middleware(['auth', 'usertypecheck:admin'])->group(function () {
    $page = 'Dashboard Admin';
    Route::get('/dashboardadmin', function () use ($page) {
        return view('dashboard.admin.dashboard',compact('page'));
    });
    Route::get('/dashboardadmin/lecturersetting', [LecturerDashboardController::class,'create']);
    Route::post('/dashboardadmin/lecturersetting', [LecturerDashboardController::class,'update']);
    Route::get('/dashboardadmin/lecturerexport', [LecturerDashboardController::class,'lecturerexport']);
    Route::post('/dashboardadmin/lecturerimport', [LecturerDashboardController::class,'lecturerimport']);
    Route::get('/dashboardadmin/studentsetting', [StudentDashboardController::class,'create']);
    Route::post('/dashboardadmin/studentsetting', [StudentDashboardController::class,'update']);
});
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

//dosen
Route::get('/dashboardlecturer', function () {
    return view('dashboard.lecturer.dashboard',[
        'page' => 'Dashboard Dosen',
        'dashboardlecturer' => Dashboard::where('usertype_id',2)->first()
        ]);
})->middleware(['auth', 'usertypecheck:lecturer']);
Route::get('/dashboardlecturer/attendance', [LecturerAttendanceController::class,'create'])->middleware(['auth', 'usertypecheck:lecturer']);
Route::get('/dashboardlecturer/attendancedetail', [LecturerAttendanceController::class,'detail'])->middleware(['auth', 'usertypecheck:lecturer']);
Route::post('/dashboardlecturer/attendancedetail', [LecturerAttendanceController::class,'change'])->middleware(['auth', 'usertypecheck:lecturer']);
Route::get('/dashboardlecturer/utslist', [UtsListController::class,'create'])->middleware(['auth', 'usertypecheck:lecturer']);
Route::get('/dashboardlecturer/utslistdetail', [UtsListController::class,'search'])->middleware(['auth', 'usertypecheck:lecturer']);
Route::get('/dashboardlecturer/profile', function () {
    return view('dashboard.lecturer.profile',
        [
        'page' => 'Dashboard Dosen'
    ]);
})->middleware(['auth', 'usertypecheck:lecturer']);

//mahasiswa
Route::get('/dashboardstudent', function () {
    return view('dashboard.student.dashboard',[
        'page' => 'Dashboard Mahasiswa',
        'dashboardstudent' => Dashboard::where('usertype_id',3)->first()
        ]);
})->middleware(['auth', 'usertypecheck:student']);
Route::get('/dashboardstudent/attendance', function () {
    return view('dashboard.student.attendance',[
        'page' => 'Dashboard Mahasiswa'
        ]);
})->middleware(['auth', 'usertypecheck:student']);
Route::get('/dashboardstudent/examcard', [ExamCardController::class,'index'])->middleware(['auth', 'usertypecheck:student']);
Route::get('/dashboardstudent/profile', function () {
    return view('dashboard.student.profile',
        [
        'page' => 'Dashboard Mahasiswa'
    ]);
})->middleware(['auth', 'usertypecheck:student']);





