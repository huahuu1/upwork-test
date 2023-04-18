<?php

use App\Http\Controllers\Api\CatalogController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Catalog routes
Route::controller(CatalogController::class)->group(function () {
    //Get catalog by Id
    Route::get('catalog/{userId}', 'getCatalogByUserId');
});

//Product routes
Route::controller(ProductController::class)->group(function () {
    //Get product by Id
    Route::get('product/{id}', 'getProductById');
    //Search product by name
    Route::get('search/product', 'searchProductByName');
    //Create product
    Route::post('create/product', 'createProduct');
    //Edit product
    Route::post('edit/product/{id}', 'editProduct');
    //Change product's status.
    Route::post('edit/product/status/{id}', 'changeProductStatus');
});
