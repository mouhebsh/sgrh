<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get("/login", [AuthController::class, 'login']);
Route::get("/logout", [AuthController::class, 'logout']);
Route::post("/authenticate", [AuthController::class, 'authenticate']);
Route::resource('/user', UserController::class);
Route::resource('/project', ProjectController::class);
Route::resource('/job', JobController::class);

