<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\StadiumController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function () {
    return view('layouts.main');
})->name('main')->middleware('auth');

Route::middleware(['check'])->group(function () {
    Route::resource('car', CarController::class);
});
Route::middleware(['check'])->group(function () {
    Route::resource('category', CategoryController::class);
});
Route::middleware(['check'])->group(function () {
    Route::resource('home', HomeController::class);
});
Route::middleware(['check'])->group(function () {
    Route::resource('hospital', HospitalController::class);
});
Route::middleware(['check'])->group(function () {
    Route::resource('stadium', StadiumController::class);
});
Route::middleware(['check'])->group(function () {
    Route::resource('student', StudentController::class);
});





Route::get('/login', [AuthController::class, 'loginPage'])->name('tologin');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'registerPage'])->name('toregister');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
