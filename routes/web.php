<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\test;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// route index baru

Route::get('/test', 'TestController@index')->name('test.index');    

// Route untuk Admin
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/admin/dashboard', [AuthController::class, 'adminDashboard'])->name('admin.dashboard');
});

// Route untuk User Biasa
Route::group(['middleware' => ['auth']], function () {
    Route::get('/user/dashboard', [AuthController::class, 'userDashboard'])->name('user.dashboard');
});

// Route untuk login
Route::post('/login', [AuthController::class, 'login'])->name('login');
});