<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CompareController;

Route::get('/', function () {
    $products = (new ProductController())->getMainPageProducts();
    $shops = (new ShopController())->getMainPageShop();
    return view('welcome', ['products'=>$products, 'shops'=>$shops]);
});


Route::resource('/products', ProductController::class);
Route::resource('/shops', ShopController::class);

//Удаление товара из магазина
Route::get('/products/{product_id}/detach/{shop_id}', [ProductController::class, 'detachFromShop']);
//Товар в конкретном магазине
Route::get('/shops/{shop_id}/products/{product_id}', [ProductController::class, 'showInShop'])->name('show_in_shop');

Route::get('/compare/{shop_id}', [CompareController::class, 'compareByShop'])->name('compare.show');
Route::get('/compare', [CompareController::class, 'index'])->name('compare.index');


//Добавление/удаление товара в список сравнения
Route::post('/compare', [CompareController::class, 'store']);
Route::delete('/compare/{product_id}', [CompareController::class, 'destroy']);
