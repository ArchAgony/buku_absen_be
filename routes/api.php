<?php

use App\Http\Controllers\KeperluanController;
use App\Http\Controllers\TamuController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);

Route::middleware('auth:sanctum')->group(function() {
    Route::post('/logout', [UserController::class, 'logout']);
    Route::apiResource('/keperluan', KeperluanController::class);
    Route::post('/keperluan/{keperluan}', [KeperluanController::class, 'updateData']);
});

Route::apiResource('/tamu', TamuController::class);