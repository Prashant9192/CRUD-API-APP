<?php

use App\Http\Controllers\ProductController;
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

// api for insert product
Route::post('product/add',[ProductController::class,'store']);
// api for showing all the products
Route::get('products',[ProductController::class,'index']);
// api for showing only one  product
Route::get('product/{id}/show',[ProductController::class,'show']);

// api for update product
//for raw data
Route::put('product/{id}/update',[ProductController::class,'update']);
//for form body
// Route::post('product/{id}/update',[ProductController::class,'update']);


// api for update product
Route::delete('product/{id}/delete',[ProductController::class,'destroy']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
