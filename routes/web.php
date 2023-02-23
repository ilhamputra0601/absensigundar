<?php

use App\Models\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\LecturerDashboardController;
use App\Http\Controllers\Admin\StudentDashboardController;
use App\Http\Controllers\Admin\AdminMinimumAttendanceController;
use App\Http\Controllers\Lecturer\LecturerAttendanceController;
use App\Http\Controllers\Lecturer\UtsListController;
use App\Http\Controllers\Lecturer\UasListController;
use App\Http\Controllers\Student\ExamCardController;
use App\Http\Controllers\Student\StudentAttendanceController;

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

require __DIR__ . '/auth.php';

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/dashboard/profile', [ProfileController::class, 'create'])->middleware(['auth']);
Route::post('/dashboard/profile', [ProfileController::class, 'update'])->middleware(['auth']);

//admin
Route::middleware(['auth', 'usertypecheck:admin'])->group(function () {
    $page = 'Laman Admin';
    Route::get('/dashboardadmin', function () use ($page) {
        return view('dashboard.admin.dashboard', compact('page'));
    });
    Route::get('/dashboardadmin/lecturersetting', [LecturerDashboardController::class, 'create']);
    Route::post('/dashboardadmin/lecturersetting', [LecturerDashboardController::class, 'update']);
    // TEMPLATE DOWNLOAD PERTAMA
    Route::get('/dashboardadmin/lecturerexport', [LecturerDashboardController::class, 'lecturerexport']);
    Route::post('/dashboardadmin/lecturerimport', [LecturerDashboardController::class, 'lecturerimport']);
    //TEMPLATE
    Route::get('/dashboardadmin/scheduleexport', [LecturerDashboardController::class, 'scheduleexport']);
    Route::post('/dashboardadmin/scheduleimport', [LecturerDashboardController::class, 'scheduleimport']);
    Route::get('/dashboardadmin/studentsetting', [StudentDashboardController::class, 'create']);
    Route::post('/dashboardadmin/studentsetting', [StudentDashboardController::class, 'update']);
    Route::get('/dashboardadmin/studentexport', [StudentDashboardController::class, 'studentexport']);
    Route::post('/dashboardadmin/studentimport', [StudentDashboardController::class, 'studentimport']);
    Route::get('/dashboardadmin/minimumattendance', [AdminMinimumAttendanceController::class, 'create']);
    Route::post('/dashboardadmin/minimumattendance', [AdminMinimumAttendanceController::class, 'insert']);
});

//dosen
Route::get('/dashboardlecturer', function () {
    return view('dashboard.lecturer.dashboard', [
        'page' => 'Laman Dosen',
        'dashboardlecturer' => Dashboard::where('usertype_id', 2)->first()
    ]);
})->middleware(['auth', 'usertypecheck:lecturer']);
Route::get('/dashboardlecturer/attendance', [LecturerAttendanceController::class, 'create'])->middleware(['auth', 'usertypecheck:lecturer']);
Route::get('/dashboardlecturer/attendancedetail', [LecturerAttendanceController::class, 'detail'])->middleware(['auth', 'usertypecheck:lecturer']);
Route::post('/dashboardlecturer/attendancedetail', [LecturerAttendanceController::class, 'change'])->middleware(['auth', 'usertypecheck:lecturer']);
Route::get('/dashboardlecturer/printattendance', [LecturerAttendanceController::class, 'print'])->middleware(['auth', 'usertypecheck:lecturer']);
Route::get('/dashboardlecturer/exportattendance', [LecturerAttendanceController::class, 'export'])->middleware(['auth', 'usertypecheck:lecturer']);
Route::get('/dashboardlecturer/utslist', [UtsListController::class, 'create'])->middleware(['auth', 'usertypecheck:lecturer']);
Route::get('/dashboardlecturer/utslistdetail', [UtsListController::class, 'search'])->middleware(['auth', 'usertypecheck:lecturer']);
Route::get('/dashboardlecturer/printattendanceuts', [UtsListController::class, 'print'])->middleware(['auth', 'usertypecheck:lecturer']);
Route::get('/dashboardlecturer/uaslist', [UasListController::class, 'create'])->middleware(['auth', 'usertypecheck:lecturer']);
Route::get('/dashboardlecturer/uaslistdetail', [UasListController::class, 'search'])->middleware(['auth', 'usertypecheck:lecturer']);
Route::get('/dashboardlecturer/printattendanceuas', [UasListController::class, 'print'])->middleware(['auth', 'usertypecheck:lecturer']);
Route::get('/dashboardlecturer/exportuaspdf', [UasListController::class, 'exportpdf'])->middleware(['auth', 'usertypecheck:lecturer']);

//mahasiswa
Route::get('/dashboardstudent', function () {
    return view('dashboard.student.dashboard', [
        'page' => 'Laman Mahasiswa',
        'dashboardstudent' => Dashboard::where('usertype_id', 3)->first()
    ]);
})->middleware(['auth', 'usertypecheck:student']);
Route::get('/dashboardstudent/attendance', [StudentAttendanceController::class, 'index'])->middleware(['auth', 'usertypecheck:student']);
Route::get('/dashboardstudent/attendancedetail', [StudentAttendanceController::class, 'search'])->middleware(['auth', 'usertypecheck:student']);
Route::get('/dashboardstudent/utscard', [ExamCardController::class, 'index'])->middleware(['auth', 'usertypecheck:student']);
Route::get('/dashboardstudent/uascard', [ExamCardController::class, 'index2'])->middleware(['auth', 'usertypecheck:student']);
