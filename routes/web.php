<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProfilesController;
use App\Services\TwilioService;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::redirect('/', 'dashboard');

Route::post('/check-email', [UsersController::class, 'checkEmail'])->name('check.email');
Route::post('/check-phone', [UsersController::class, 'checkPhone'])->name('check.phone');
Route::post('/check-id', [UsersController::class, 'checkId'])->name('check.id');

Route::post('/send-code', function (Request $request, TwilioService $twilioService) {
    $request->validate([
        'phone' => 'required'
    ]);

    $twilioService->sendVerificationCode($request->phone);

    return response()->json(['message' => 'Verification code sent.']);
});

Route::post('/verify-code', function (Request $request, TwilioService $twilioService) {
    $request->validate([
        'phone' => 'required|phone:ZA',
        'code' => 'required|numeric'
    ]);

    if ($twilioService->verifyCode($request->phone, $request->code)) {
        return response()->json(['message' => 'Verification code verified.']);
    }

    return response()->json(['message' => 'Invalid verification code.'], 400);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardsController::class, 'show'])->name('dashboard');

    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
    Route::get('/users/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UsersController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UsersController::class, 'destroy'])->name('users.destroy');

    Route::get('/users/profile/{user}', [ProfilesController::class, 'show'])->name('profile');

});

require __DIR__.'/auth.php';
