<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;

Route::get('/', function () {
    $products = (new ProductController())->getMainPageProducts();
    $shops = (new ShopController())->getMainPageShop();
    return view('welcome', ['products'=>$products, 'shops'=>$shops]);
});


Route::resource('/products', ProductController::class);
Route::resource('/shops', ShopController::class);


Route::get('/products/{product_id}/detach/{shop_id}', [ProductController::class, 'detachFromShop']);
