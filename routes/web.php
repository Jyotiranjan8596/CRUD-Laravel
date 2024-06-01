<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('register');
});

Route::post('register',[UserController::class,'register'])->name('register');
Route::get('register',function(){
    return view('login');
});
Route::get('login',function(){
    return view('register');
});
Route::post('login',[UserController::class,'register'])->name('login');
