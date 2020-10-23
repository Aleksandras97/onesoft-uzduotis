<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Companies
Route::get('/companies',[\App\Http\Controllers\CompanyController::class, 'index'])->name('companies.index');
Route::get('/companies/edit/{company}', [\App\Http\Controllers\CompanyController::class, 'edit'])->name('companies.edit');
Route::get('companies/show/{company}', [\App\Http\Controllers\CompanyController::class, 'show'])->name('companies.show');
Route::get('companies/create', [\App\Http\Controllers\CompanyController::class, 'create'])->name('companies.create');
Route::post('/companies/store',[\App\Http\Controllers\CompanyController::class, 'store'])->name('companies.store');
Route::put('/updateCompany/{company}',[\App\Http\Controllers\CompanyController::class, 'update'])->name('companies.update');
Route::delete('/companies/{company}',[\App\Http\Controllers\CompanyController::class, 'destroy'])->name('companies.delete');
//Employees
Route::get('/employees',[\App\Http\Controllers\EmployeeController::class, 'index'])->name('employees.index');
Route::get('/employees/edit/{employee}', [\App\Http\Controllers\EmployeeController::class, 'edit'])->name('employees.edit');
Route::get('employees/show/{employee}', [\App\Http\Controllers\EmployeeController::class, 'show'])->name('employees.show');
Route::get('employees/create', [\App\Http\Controllers\EmployeeController::class, 'create'])->name('employees.create');
Route::post('/employees/store',[\App\Http\Controllers\EmployeeController::class, 'store'])->name('employees.store');
Route::put('/updateEmployee/{employee}',[\App\Http\Controllers\EmployeeController::class, 'update'])->name('employees.update');
Route::delete('/employees/{employee}',[\App\Http\Controllers\EmployeeController::class, 'destroy'])->name('employees.delete');
//Route::view('home', 'home')->middleware('auth');
