<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('employees/test', [App\Http\Controllers\employeeController::class, 'test']);

Route::get('employees/test', [App\Http\Controllers\employeeController::class, 'test']);


Route::get('employees/test', [App\Http\Controllers\employeeController::class, 'test']);
Route::get('employees/find', [App\Http\Controllers\employeeController::class, 'find']);


Route::get('employees/test', [App\Http\Controllers\employeeController::class, 'test']);
Route::get('employees/find', [App\Http\Controllers\employeeController::class, 'find']);
Route::get('employees/event', [App\Http\Controllers\employeeController::class, 'event']);


Route::get('employees/test', [App\Http\Controllers\employeeController::class, 'test']);
Route::get('employees/find', [App\Http\Controllers\employeeController::class, 'find']);
Route::get('employees/event', [App\Http\Controllers\employeeController::class, 'event']);


Route::get('employees/test', [App\Http\Controllers\employeeController::class, 'test']);
Route::get('employees/find', [App\Http\Controllers\employeeController::class, 'find']);
Route::get('employees/event', [App\Http\Controllers\employeeController::class, 'event']);


Route::get('employees/test', [App\Http\Controllers\employeeController::class, 'test']);
Route::get('employees/find', [App\Http\Controllers\employeeController::class, 'find']);
Route::get('employees/event', [App\Http\Controllers\employeeController::class, 'event']);


Route::get('employees/test', [App\Http\Controllers\employeeController::class, 'test']);
Route::get('employees/find', [App\Http\Controllers\employeeController::class, 'find']);
Route::get('employees/event', [App\Http\Controllers\employeeController::class, 'event']);
