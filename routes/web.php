<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ClasesController;

use App\Http\Controllers\Security;

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
    return view('auth.login');
});

Route::resource('students','App\Http\Controllers\StudentsController');
Route::resource('courses','App\Http\Controllers\CoursesController');
Route::resource('teachers','App\Http\Controllers\TeachersController');
Route::resource('subjects','App\Http\Controllers\SubjectController');
Route::resource('schedules','App\Http\Controllers\ScheduleController');
Route::resource('enrollments','App\Http\Controllers\EnrollmentsController');
Route::resource('clases','App\Http\Controllers\ClasesController');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dash', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('students',StudentsController::class)->names('students.index');
    Route::resource('courses',CoursesController::class)->names('courses.index');
    Route::resource('teachers',TeachersController::class)->names('teachers.index');
    Route::get('permissions',[Security\PermissionsController::class, 'index'])->name('permissions.index');
    Route::resource('enrollments',EnrollmentController::class)->names('enrollments.index');
    Route::resource('enrollments',EnrollmentController::class)->names('enrollments.create');
    Route::resource('clases',ClasesController::class)->names('clases.index');

});



