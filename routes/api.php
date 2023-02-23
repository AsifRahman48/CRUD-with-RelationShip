<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DummyAPI;

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

Route::get('dummy',[DummyAPI::class,'index']);
Route::get('products',[ProductController::class,'api']);
Route::post('products',[ProductController::class,'add']);
Route::put('products/{id}',[ProductController::class,'apiUpdate']);
Route::delete('products/{id}',[ProductController::class,'apiDelete']);
Route::get('search/{value}',[ProductController::class,'search']);
Route::get('products/{id}',[ProductController::class,'getId']);
