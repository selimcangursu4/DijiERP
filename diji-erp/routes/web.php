<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PersonnelManagementController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StaticDataController;
use App\Http\Controllers\LocationController;


Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/static/employee-create', [StaticDataController::class, 'employeeCreate'])->name('static.employee.create');
Route::get('/districts/{city}', [LocationController::class, 'getDistricts']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/human-resources/employee-management', [PersonnelManagementController::class, 'index'])
        ->name('employee-management.index');
    Route::get('/human-resources/employee-management/create', [PersonnelManagementController::class, 'create'])
        ->name('employee-management.create');
    Route::get('/human-resources/employee-management/fetch', [PersonnelManagementController::class, 'fetch'])
        ->name('employee-management.fetch');
    Route::post('/human-resources/employee-management/store', [PersonnelManagementController::class, 'store'])
        ->name('employee-management.store');
    Route::get('/human-resources/employee-management/edit/{id}', [PersonnelManagementController::class, 'edit'])
        ->name('employee-management.edit');
    Route::post('/human-resources/employee-management/profile-update/{id}', [PersonnelManagementController::class, 'profileUpdate'])
        ->name('employee-management.profile-update');
    Route::post('/human-resources/employee-management/personel-update/{id}', [PersonnelManagementController::class, 'personelUpdate'])
        ->name('employee-management.personel-update');
    
});
