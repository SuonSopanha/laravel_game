<?php

use Illuminate\Support\Facades\Route;
use Gameaaa\Agroupnine\Http\Controllers\GameController;


Route::middleware(['guest', 'web'])->group(function () {
    Route::get('/', [GameController::class, 'index']);
    Route::get('/login',[GameController::class, 'login']);
    Route::post('/login',[GameController::class, 'loginUser']);
    Route::get('/register',[GameController::class, 'register']);
    Route::post('/registerUser',[GameController::class, 'registerUser']);
    Route::post('/logout',[GameController::class, 'logout']);

    Route::get('/play',[GameController::class, 'play']);
    Route::post('/playGame',[GameController::class, 'playGame']);
    Route::get('/leaderboard',[GameController::class, 'leaderboard']);
    Route::get('/');
});
