<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContructionController;
use App\Http\Controllers\InfomationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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
Route::get('/getCategories', [CategoryController::class, 'getCategories']);

Route::post('/addProduct', [ProductController::class, 'addProduct']);

Route::get('/getProducts', [ProductController::class, 'getProducts']);

Route::post('/signUp/admin2211/dut', [UserController::class, 'signUp']);

Route::post('/signIn', [UserController::class, 'signIn']);

Route::get('/checkLogin', [UserController::class, 'checkLogin'])->middleware('auth:api');

Route::get('/getInfomations', [InfomationController::class, 'getInfomations']);

Route::post('/updateInfomations', [InfomationController::class, 'updateInfomations']);

Route::post('/addCart', [CartController::class, 'addCart']);

Route::get('/getCarts', [CartController::class, 'getCarts']);

Route::delete('/removeCart/{id}', [CartController::class, 'removeCart']);

Route::post('/seenCart/{id}', [CartController::class, 'seenCart']);

Route::delete('/removeProduct/{id}', [ProductController::class, 'removeProduct']);

Route::post('/addConstruction', [ContructionController::class, 'addConstruction']);

Route::get('/getConstructions', [ContructionController::class, 'getConstructions']);











