<?php

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

Route::get('/', function () {
    return to_route('dashboard');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('dashboard', ['App\Http\Controllers\DashboardController', 'index'])->name('dashboard');
    Route::get('user/create', ['App\Http\Controllers\UserController', 'create'])->name('users.create');
    Route::post('user/store', ['App\Http\Controllers\UserController', 'store'])->name('users.store');
    Route::get('user', ['App\Http\Controllers\UserController', 'index'])->name('users.index');
    Route::put('user/{user}', ['App\Http\Controllers\UserController', 'update'])->name('users.update');
    Route::get('userProfile', ['App\Http\Controllers\UserController', 'userProfile'])->name('users.userProfile');
    Route::get('viewSupervisor', ['App\Http\Controllers\UserController', 'viewSupervisor'])->name('viewSupervisor');

    Route::resource('course', \App\Http\Controllers\CourseController::class);
    Route::resource('courseRegistration', \App\Http\Controllers\CourseRegistrationController::class);
    Route::resource('studentSynopsisThesis', \App\Http\Controllers\StudentSynopsisThesisController::class);
    Route::get('viewRegisterCourses', ['App\Http\Controllers\CourseRegistrationController', 'viewRegisterCourses'])->name('course.viewRegisterCourses');
    Route::resource('studentSynopsisThesis', \App\Http\Controllers\StudentSynopsisThesisController::class);

    Route::get('studentSynopsisThesis/{id}/comments', [\App\Http\Controllers\StudentSynopsisThesisController::class,'thesisSynopsisStatus'])->name('thesisSynopsisStatus');
    // supervisor view
    Route::get('viewRegisterStudentDetail', [\App\Http\Controllers\SupervisorController::class, 'viewRegisterStudentDetail'])->name('viewRegisterStudentDetail');

    Route::resource('comment', \App\Http\Controllers\CommentController::class);

    Route::get('viewThesisSynopsis', [\App\Http\Controllers\SupervisorController::class, 'viewThesisSynopsis'])->name('viewThesisSynopsis');
    Route::get('manageSchedule', [\App\Http\Controllers\SupervisorController::class, 'manageSchedule'])->name('manageSchedule');
    Route::post('manageSchedule', [\App\Http\Controllers\SupervisorController::class, 'manageScheduleUpdate'])->name('manageScheduleUpdate');
});




