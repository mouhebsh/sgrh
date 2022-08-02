<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get("/login", [EmployeeController::class, 'login']);
Route::get("/logout", [EmployeeController::class, 'logout']);
Route::post("/authenticate", [EmployeeController::class, 'authenticate']);
Route::resource('/employee', EmployeeController::class);
Route::resource('/project', ProjectController::class);
Route::resource('/job', JobController::class);

