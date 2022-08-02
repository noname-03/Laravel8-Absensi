<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ClassEducationController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\User\ClassEducationController as ClassMemberController;

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
    return redirect()->route('login');
});

Route::get('/home', [HomeController::class, 'index']);

Route::middleware(['auth'])->group(function () {

    Route::prefix('/')->name('admin.')->middleware(['admin'])->group(function () {
        // data

        Route::get('admin', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin');
        Route::resource('class_education', ClassEducationController::class);
        Route::resource('user', UserController::class);
        Route::resource('attendances', AttendanceController::class);
    });

    Route::prefix('/mahasiswa')->name('mahasiswa.')->middleware(['user'])->group(function () {
        // user

        Route::get('/mahasiswa', function () {
            return redirect()->route('mahasiswa.class.index');
        })->name('mahasiswa');
        Route::resource('class', ClassMemberController::class);
    });

    Route::get('/logout', function () {
        Auth::logout();
        return redirect('/login');
    });
});

require __DIR__ . '/auth.php';
