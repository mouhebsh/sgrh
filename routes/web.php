<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConversationsController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use Illuminate\Contracts\Cache\Store;
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
    Route::get('/conversations',[ConversationsController::class, 'index'])->name('conversations');
    Route::get('/conversations/{user}',[ConversationsController::class, 'show'])
    ->middleware('can:talkTo,user')
    ->name('conversations.show');
    Route::post('/conversations/{user}',[ConversationsController::class, 'store'])
    ->name('conversations.show');
    Route::get("/logout", [AuthController::class, 'logout']);


});
Route::get("/login", [AuthController::class, 'login']);
Route::post("/authenticate", [AuthController::class, 'authenticate']);







