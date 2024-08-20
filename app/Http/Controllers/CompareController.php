<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;
use App\Models\Compare;

class CompareController extends Controller
{
    /**
     * Индексная страница списка сравннеий
     * @return array|\Closure|false|\Illuminate\Container\Container|mixed|object|null
     */
    public function index()
    {
        $product = new Compare();
        $shop = new Shop();
        return view('compare.index', ['products'=>$product->all(), 'shops'=>$shop->all()]);
    }

    /**
     * Сумма стоимости товаров из списка
     * @param int $shopId
     * @return array|\Closure|false|\Illuminate\Container\Container|mixed|object|null
     */
    public function compareByShop(int $shopId)
    {

        $sum = 0;
        $productIdInComp = [];
        $productInCompare = (new Compare())->all();
        foreach ($productInCompare as $item){
            $productIdInComp[] = $item->product_id;
        }

        $shop = (new Shop())->find($shopId);
        $products = $shop->products;

        foreach ($products as $key => $product)
        {
            if(in_array($product->id, $productIdInComp)){
                $sum +=  $product->pivot->product_price_in_shop;
            } else {
                unset($products[$key]);
            }
        }

        return view('compare.show', ['products'=>$products, 'shop'=>$shop, 'sum'=>$sum]);
    }

    /**
     * Добавить продукт в список
     * @param int $productId
     * @return int
     */
    public function store(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $product = new Compare();
        $payload = [
            'product_id' => $data['product_id'],
            'user_id' => 1 //Мифический user_id который должен вычисляться при аутентификации пользователя =)
        ];

        $product->fill($payload)->save();
        return $product->fill($payload)->save();
    }


    /**
     * Удаление товара из списка сравнения
     * @param int $productid
     * @return mixed
     */
    public function destroy(int $productid)
    {
        $product = new Compare();
        return $product->where('product_id', $productid)->delete();
    }
}
