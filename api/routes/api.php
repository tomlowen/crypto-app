<?php

use App\Http\Controllers\CoinController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], function () {
    Route::group(['prefix' => 'coins'], function () {
        Route::get('/', [CoinController::class, 'index']);
        Route::get('/{coingeckoId}', [CoinController::class, 'show']);
    });
});