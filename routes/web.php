<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LeadController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;


Route::get('/', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Registration routes
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::middleware('auth')->group(function() {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/leads/{id}/history', [LeadController::class, 'history'])->name('leads.history');


    Route::get('/leads', [LeadController::class, 'index'])->name('leads.index');
    Route::get('/leads/create', [LeadController::class, 'create'])->name('leads.create');
    Route::post('/leads', [LeadController::class, 'store'])->name('leads.store');
    Route::get('/leads/{id}/edit', [LeadController::class, 'edit'])->name('leads.edit');
    Route::post('/leads/{id}/update', [LeadController::class, 'update'])->name('leads.update');
    Route::post('/leads/{id}/delete', [LeadController::class, 'destroy'])->name('leads.delete');

    Route::get('/leads/import', [LeadController::class, 'showImportForm'])->name('leads.import.form');
    Route::post('/leads/import', [LeadController::class, 'import'])->name('leads.import');
    Route::get('/leads/export', [LeadController::class, 'export'])->name('leads.export');
});
