<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StadiumController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/main', function () {
    return view('layouts.main');
})->name('main');

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
Route::middleware(['check'])->group(function () {
    Route::resource('role', RoleController::class);
});


Route::get('/logout', [AuthController::class, 'logout'])->name('logout');