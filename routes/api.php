<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => 'auth:sanctum'], function () {
    //All secure URL's
    Route::get("profile", [UserController::class, 'profile']);
    Route::get('product/index',  [ProductController::class, 'index']);

    Route::post('add_to_cart',  [CartController::class, 'store']);
    Route::get('show_cart',  [CartController::class, 'index']);
});

Route::post('product/store',  [ProductController::class, 'store']);
Route::get('product/show/{id}',  [ProductController::class, 'show']);


Route::post("login", [UserController::class, 'index']);
Route::post("register", [UserController::class, 'register']);
