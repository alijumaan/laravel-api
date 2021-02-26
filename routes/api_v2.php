<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('categories', \App\Http\Controllers\Api\V2\CategoryController::class);
Route::get('products', [\App\Http\Controllers\Api\V2\ProductController::class, 'index']);


