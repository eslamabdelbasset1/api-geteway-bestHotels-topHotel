<?php

use App\Http\Controllers\BestHotelController;
use App\Http\Controllers\TopHotelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('best-hotels')->middleware('simulate.latency')->group(function () {
    Route::resource('/', BestHotelController::class);
});

Route::prefix('top-hotels')->middleware('simulate.latency')->group(function () {
    Route::resource('/', TopHotelController::class);
});
