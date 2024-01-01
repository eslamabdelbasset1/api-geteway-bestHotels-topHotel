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

Route::prefix('best-hotels')->group(function () {
    Route::get('/', [BestHotelController::class, 'allData']);
    Route::get('/excel', [BestHotelController::class, 'exportToExcel']);
    Route::get('/process-excel', [BestHotelController::class, 'processExcelSheets']);
    Route::get('/show-redis', [BestHotelController::class, 'showDataInView']);
});

Route::prefix('top-hotels')->group(function () {
    Route::get('/', [TopHotelController::class, 'allData']);
    Route::get('/excel', [TopHotelController::class, 'exportToExcel']);
});

