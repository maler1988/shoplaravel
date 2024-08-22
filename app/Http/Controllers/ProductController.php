<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Review;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = new Product();
        return view('product.index', ['products'=>$product->all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = new Product();
        $productData = $product->find($id);

        $reviews = Review::where('product_id', '=', $id)->get();
        return view('product.show', ['product'=>$productData, 'reveiws'=>$reviews]);
    }

    /**
     * Показать товар в магазине
     * @param int $shopId
     * @param int $productId
     * @return array|\Closure|false|\Illuminate\Container\Container|mixed|object|null
     */
    public function showInShop(int $shopId, int $productId)
    {
        $product = new Product();
        $productData = $product->find($productId);
        //Не уверен в правильности такого подхода, shops всё равно приходится перебивать foreache-м в шаблоне
        $productData->shops = $productData->shops()->wherePivot('shop_id', $shopId)->get();
        return view('product.show_in_shop', ['product'=>$productData, 'shopid'=>$shopId]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Для вывода товаров на главной
     * @return mixed
     */
    public function getMainPageProducts()
    {
        $products = Product::orderBy('created_at', 'DESC')->limit(4)->get();
        return $products;
    }


    /**
     * @param int $productId
     * @param int $shopId
     * @return false
     */
    public function detachFromShop(int $productId, int $shopId)
    {
        $product = (new Product())->findOrFail($productId);
        if($product){
           return $product->shops()->wherePivot('shop_id', $shopId)->detach();
        }

        return false;
    }
}
