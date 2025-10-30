<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Cách A – Áp dụng throttle trên nhóm API:
Route::middleware(['throttle:60,1'])->group(function () {
    Route::get('/public-info', fn() => ['status'=>'ok']);
    // Các route API khác...
});
