<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;

Route::get('/', [GameController::class, 'index']);
Route::delete('/games/{id}', [GameController::class, 'destroy']);
Route::post('/games', [GameController::class, 'store']);
