<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardsController;

use Illuminate\Support\Facades\Route;

Route::redirect('/', 'dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardsController::class, 'show'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
