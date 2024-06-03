<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('register');
});

Route::post('register',[UserController::class,'register'])->name('register');

Route::get('register',function(){
    return view('login');
});

Route::post('login',[UserController::class,'login'])->name('login');
Route::get('login',function(){
    return view('register');
});

Route::post('create-employee',[EmployeeController::class,'create_employee'])->name('create-employee');
Route::get('create-employee',function(){
    return view('employee');
});

// Route::post('get-employee',[UserController::class,'login'])->name('get-employee');
Route::get('get-employee',[EmployeeController::class,'get_employees']);

Route::get('/employee/{id}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
Route::delete('/employee/{id}', [EmployeeController::class, 'destroy'])->name('employee.delete');