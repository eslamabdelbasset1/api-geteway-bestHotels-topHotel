<?php

use App\Http\Controllers\BestHotelController;
use App\Http\Controllers\TopHotelController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/show-excel', [BestHotelController::class, 'BestHotelsReadExcel']);
//Route::get('/show-excel', [TopHotelController::class, 'topHotelsReadExcel']);

