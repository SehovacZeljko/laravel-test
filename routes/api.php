<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\NinjaController;
use App\Http\Controllers\Api\ProfileController;

// Quick test route
Route::get('/ping', function (Request $request) {
    return response()->json([
        'message' => 'API is working!',
        'time' => now()->toISOString(),
        'user' => \Illuminate\Support\Facades\Auth::check() ? 'Logged in' : 'Not logged in'
    ]);
});

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected routes (require Sanctum token)
Route::middleware('auth:sanctum')->group(function () {
    // Auth
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/logout-all', [AuthController::class, 'logoutAll']);
    Route::get('/me', [AuthController::class, 'me']);
    
    // Ninjas
    Route::apiResource('ninjas', NinjaController::class);
    
    // Profile
    Route::get('/profile', [ProfileController::class, 'show']);
    Route::put('/profile', [ProfileController::class, 'update']);
    Route::delete('/profile', [ProfileController::class, 'destroy']);
});