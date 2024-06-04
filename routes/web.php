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
Route::get('get-employee',[EmployeeController::class,'get_employees'])->name('get.employee');

Route::post('/employee/{id}/edit', [EmployeeController::class, 'update_employee'])->name('employee.edit');
Route::get('employee/{id}/update-employee',[EmployeeController::class,'get_employee_by_id'])->name('get.employee.by.id');
Route::delete('/employee/{id}', [EmployeeController::class, 'delete_employee'])->name('employee.delete');