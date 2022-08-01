<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ClassEducationController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AttendanceController;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {

    Route::prefix('/')->name('admin.')->middleware(['admin'])->group(function () {
        // data

        // Route::get('/admin', function () {
        //     return "admin";
        // })->name('admin');
        // Route::get('/admin', AdminController::class, 'index')->name('admin');
        Route::get('admin', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin');
        Route::resource('class_education', ClassEducationController::class);
        Route::resource('user', UserController::class);
        Route::resource('attendances', AttendanceController::class);
        // Route::resource('category', CategoryController::class)->parameters([
        //     'category' => 'category:name',
        // ]);
        // Route::resource('product', ProductController::class);
        // Route::resource('user', UserController::class);
        // Route::get('datatransaction', [App\Http\Controllers\TransactionController::class, 'datatransaction'])->name('datatransaction');
        // Route::get('datatransactionshow/{transaction}', [App\Http\Controllers\TransactionController::class, 'datatransactionshow'])->name('datatransactionshow');
    });

    Route::prefix('/mahasiswa')->name('mahasiswa.')->middleware(['user'])->group(function () {
        // user

        Route::get('/mahasiswa', function () {
            return "mahasiswa";
        })->name('mahasiswa');
        Route::get('mahasiswa', [App\Http\Controllers\User\HomeController::class, 'index'])->name('mahasiswa');
        // Route::get('user', [UserController::class, 'index']);
        // Route::resource('cart', CartController::class);
        // Route::get('getcart', [CartController::class 'indexjson'])->name('getcart');
        // Route::patch('update-cart', [CartController::class, 'tes'])->name('update.cart');
        // Route::resource('transaction', TransactionController::class);
    });

    Route::get('/logout', function () {
        Auth::logout();
        return redirect('/login');
    });
});

require __DIR__ . '/auth.php';
