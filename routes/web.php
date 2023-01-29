<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JourneyController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", [DashboardController::class, "dashboard"]);

Route::get("journeys/{page?}", [JourneyController::class, "showAllRecords"]);
Route::get("journey/{id}", [JourneyController::class, "showOneRecord"]);

Route::get("stations/", [StationController::class, "showAllRecords"]);
Route::get("station/{id}", [StationController::class, "showOneRecord"]);