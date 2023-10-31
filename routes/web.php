<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, "index"]);

Route::get("/all", [ProductController::class, "all"]);
Route::get("/getById/{id}", [ProductController::class, "getById"]);
Route::get("/products", [ProductController::class, "index"]);
Route::get("/product/{id}", [ProductController::class, "show"]);
Route::post("/products/list", [ProductController::class, "list"]);

Route::get("/cart", [CartController::class, "index"]);
