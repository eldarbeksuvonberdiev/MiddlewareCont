<?php

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


Route::get('/',function(){
    return view('layouts.main');
});
Route::resource('cars',CarController::class);
Route::resource('category',CategoryController::class);
Route::resource('home',HomeController::class);
Route::resource('hospital',HospitalController::class);
Route::resource('stadium',StadiumController::class);
Route::resource('student',StudentController::class);