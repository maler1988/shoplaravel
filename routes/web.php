<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CompareController;
use \App\Http\Controllers\ReviewController;
use \App\Http\Controllers\SessionController;

Route::get('/', function () {
    $products = (new ProductController())->getMainPageProducts();
    $shops = (new ShopController())->getMainPageShop();
    return view('welcome', ['products'=>$products, 'shops'=>$shops]);
})->name('home');


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

//Отзывы на товары
Route::resource('/reviews', ReviewController::class);

//Авторизация, регистрация
Route::middleware(['guest'])->group(function(){
    Route::get('/auth/login', [ SessionController::class, 'create' ])->name('auth.login');
    Route::post('/auth/login', [ SessionController::class, 'store' ]);
});

//ЛК, выход
Route::middleware(['auth'])->group(function(){

    Route::get('/auth/profile', [ SessionController::class, 'profile' ])->name('auth.profile');
    Route::post('/auth/logout', [ SessionController::class, 'destroy' ])->name('auth.logout');

});
