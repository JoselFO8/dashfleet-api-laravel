<?php

use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ArrayDataController;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::controller(ClientController::class)->group(function () {
    Route::get('/clients', 'index');
    Route::post('/client', 'store');
    Route::put('/client/{id}', 'update');
    Route::delete('/client/{id}', 'destroy');
});

Route::controller(OrderController::class)->group(function () {
    Route::get('/orders', 'index');
    Route::post('/order', 'store');
    Route::put('/order/{id}', 'update');
    Route::delete('/order/{id}', 'destroy');
    Route::get('/order/{orderCode}', 'orderUser');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
