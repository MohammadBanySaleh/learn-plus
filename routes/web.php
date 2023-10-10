<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\AdminAuth;
use App\Http\Controllers\TeacherAuth;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\AssignmentController;


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

Route::get('/', function () {
    return view('student_dashboard.index');
});

Route::get('/courses', function () {
    return view('course-grid');
});

Route::get('/singleCourse', function () {
    return view('page-sidebar');
});


// Admin routes start

Route::get('/admin_login', [AdminAuth::class, 'login']);

Route::post('admin_login', [AdminAuth::class, 'loginAdmin'])->name('admin_login2');
Route::get('admin_dashboard/home', [AdminAuth::class, 'adminHome'])->middleware('adminMiddleWare');
Route::get('dashboard_logout', [AdminAuth::class, 'adminLogout']);


Route::middleware(['adminMiddleWare'])->group(function () {
    Route::resource('admin_dashboard/grades', GradeController::class);
    Route::resource('admin_dashboard/teachers', TeacherController::class);
    Route::resource('admin_dashboard/students', StudentController::class);
    Route::resource('admin_dashboard/subjects', SubjectController::class);

});

// Admin routes end

// Teacher routes start

Route::get('/teacher_login', [TeacherAuth::class, 'login']);
Route::post('teacher_login', [TeacherAuth::class, 'loginTeacher'])->name('teacher_login');
Route::get('teacher_dashboard/home', [TeacherAuth::class, 'teacherHome'])->middleware('teacherMiddleWare');
Route::get('teacher_dashboard_logout', [TeacherAuth::class, 'teacherLogout']);

Route::middleware(['teacherMiddleWare'])->group(function () {

    // contents routes
    Route::resource('teacher_dashboard/contents', ContentController::class);
    Route::get('teacher_dashboard/contents/index/{id}', [ContentController::class, 'index2'])->name('contents.indexBySubject');
    Route::get('teacher_dashboard/contents/create/{id}', [ContentController::class, 'create2'])->name('contents.createBySubject');
    Route::post('teacher_dashboard/contents/store/{id}', [ContentController::class, 'store2'])->name('contents.storeBySubject');

    // assignments routes
    Route::resource('teacher_dashboard/assignments', AssignmentController::class);
    Route::get('teacher_dashboard/assignments/index/{id}', [AssignmentController::class, 'index2'])->name('assignments.indexBySubject');
    Route::get('teacher_dashboard/assignments/create/{id}', [AssignmentController::class, 'create2'])->name('assignments.createBySubject');
    Route::post('teacher_dashboard/assignments/store/{id}', [AssignmentController::class, 'store2'])->name('assignments.storeBySubject');
    Route::get('teacher_dashboard/assignments/solutions/{id}', [AssignmentController::class, 'solutions'])->name('assignments.solutions');
    // Route::post('teacher_dashboard/assignments/update_mark/{solutionId}', [AssignmentController::class, 'updateMark'])->name('assignments.updateSolutionMark');
    Route::post('teacher_dashboard/assignments/update_mark', [AssignmentController::class,'updateSolutionMark'])->name('assignments.updateSolutionMark');










});
// Teacher routes end