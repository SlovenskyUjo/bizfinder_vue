<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::get('/companies', [CompanyController::class, 'index'])->name('company.index');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])->group(function () {
    Route::get('/panel', [PanelController::class, 'index'])->name('panel');
    Route::post('/panel', [CompanyController::class, 'store'])->name('company.create');
    Route::post('/panel/approve/{id}', [CompanyController::class, 'approve']);
    Route::delete('/panel/remove/{id}', [CompanyController::class, 'destroy'])->name('company.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
