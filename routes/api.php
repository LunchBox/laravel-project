<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\AuthSessionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group(["prefix" => "v1"], function () {
  Route::post('/login', [AuthSessionController::class, 'store']);

  Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthSessionController::class, 'destroy']);

    Route::apiResource('projects', ProjectController::class);
  });
});


