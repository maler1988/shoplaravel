<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

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
        return view('product.show', ['product'=>$productData]);
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

    public function testMethod()
    {

    }
}
