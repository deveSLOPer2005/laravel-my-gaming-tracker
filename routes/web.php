<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\AuthController;

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::post('/delete-account', [AuthController::class, 'deleteAccount']);

Route::middleware('auth')->group(function () {
    Route::get('/', [GameController::class, 'index']);
    Route::get('/games/{id}/edit', [GameController::class, 'edit']);
    Route::delete('/games/{id}', [GameController::class, 'destroy']);
    Route::post('/games', [GameController::class, 'store']);
    Route::put('/games/{id}', [GameController::class, 'update']);
});