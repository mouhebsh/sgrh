<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});
Route::get('/register', function () {
    return view('auth/register');
});
Route::get('/login', function () {
    return view('auth/login');
});

Route::resource('/employee', EmployeeController::class);
Route::resource('/project', ProjectController::class);
Route::resource('/job', JobController::class);
Route::resource('/auth', JobController::class);

