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




// Middelware Routes for Roles & Permissions

Route::group(['middleware' => ['auth']], function() {
    Route::resource('/user', UserController::class);
    Route::resource('/project', ProjectController::class);
    Route::resource('/job', JobController::class);
    Route::get("/logout", [AuthController::class, 'logout']);

});
Route::get("/login", [AuthController::class, 'login']);
Route::post("/authenticate", [AuthController::class, 'authenticate']);



    // Route::resource('/user', UserController::class)->middleware('auth');
    // Route::resource('/project', ProjectController::class)->middleware('auth');
    // Route::resource('/job', JobController::class)->middleware('auth');
    // Route::get("/logout", [AuthController::class, 'logout'])->middleware('auth');
    // Route::get("/login", [AuthController::class, 'login']);
    // Route::post("/authenticate", [AuthController::class, 'authenticate']);




