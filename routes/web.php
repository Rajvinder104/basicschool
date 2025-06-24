<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashbaordController;
use Illuminate\Support\Facades\Route;

// Route::get('/test-mail', function () {
//     $user = \App\Models\User::first(); // replace with existing user
//     \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\ForgotPasswordMail($user));
//     return "Mail sent!";
// });

Route::get('send-mail',[AuthController::class, 'Sendmail']);

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'Authlogin'])->name('Authlogin');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::match(['get', 'post'], 'forgot-password', [AuthController::class, 'ForgotPassword'])->name('forgot.password');

Route::group(['middleware' => 'admin'], function () {
    Route::get('admin/dashboard', [DashbaordController::class, 'index'])->name('admin.dashboard');
});
Route::group(['middleware' => 'teacher'], function () {
    Route::get('teacher/dashboard', [DashbaordController::class, 'index'])->name('teacher.dashboard');
});
Route::group(['middleware' => 'student'], function () {
    Route::get('student/dashboard', [DashbaordController::class, 'index'])->name('student.dashboard');
});
Route::group(['middleware' => 'parent'], function () {
    Route::get('parent/dashboard', [DashbaordController::class, 'index'])->name('parent.dashboard');
});
