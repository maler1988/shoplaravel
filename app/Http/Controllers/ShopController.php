<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Product;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shop = new Shop();
        return view('shop.index', ['shops'=>$shop->all()]);
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
        $payload = $request->validate([
            'name' => 'required|min:5|max:50',
            'description' => [ 'required', 'min:10', 'max:500' ],
        ]);

        $shop = new Shop();
        $shop->fill($payload)->save();

        return redirect()
            ->route('shops.index')
            ->with('notice', 'Shop created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $shop = new Shop();
        $shopData = $shop->find($id);
        return view('shop.show', ['shop'=>$shopData]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = new Product();
        $productData = $product->all();

        $shop = new Shop();
        $shopData = $shop->find($id);
        $arProductsInShop = [];

        foreach ($shopData->products as $item){
            $arProductsInShop[$item->id]['price'] = $item->pivot->product_price_in_shop;
        }

        return view('shop.edit', [
            'shop' => $shopData,
            'products' => $productData,
            'products_in_shop' => $arProductsInShop
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $payload = $request->validate([
            'name' => 'required|min:5|max:50',
            'description' => [ 'required', 'min:10', 'max:500' ],
            'price' => '',
            'product' => ''
        ]);


        $shopDataUpdate = [
            'name' => $payload['name'],
            'description' => $payload['description']
        ];

        $shop = Shop::findOrFail($id);

        //id связанных товаров c ценой больше 0
        $arSyncData = [];
        foreach ($payload['product'] as $key => $productId){
            if((float)$payload['price'][$key] > 0){
                $arSyncData[$productId] = [
                    'product_price_in_shop' => $payload['price'][$key]
                ];
            }
        }

        if($arSyncData){
            $shop->products()->sync($arSyncData);
        }

        $shop->update($shopDataUpdate);

        return redirect()
            ->route('shops.show', [$id])
            ->with('notice', 'Shop created');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Магазины на главной
     * @return mixed
     */
    public function getMainPageShop()
    {
        $arShops = Shop::orderBy('created_at')->limit(3)->get();
        return $arShops;
    }
}
