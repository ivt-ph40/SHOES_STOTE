<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart as Cart;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cartCount = Cart::content()->count();
        $product = Product::with('images','product_details', 'brand')->find($id);
        $relatedItems = Product::with('images','category')
                            ->whereNotIn('products.id', [$id])
                            ->get();
        return view('users.product-detail', compact('product', 'relatedItems', 'cartCount'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function showAllMenShoes(){
        // DB::enableQueryLog();
        $cartCount = Cart::content()->count();
        $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.parent_id', 1);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
        // dd(DB::getQueryLog());
        return view('users.product-listing', compact('products', 'cartCount'));
    }

    public function showAllWomenShoes(){
        $cartCount = Cart::content()->count();
        $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.parent_id', 2);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
        return view('users.product-listing', compact('products', 'cartCount'));
    }

    public function showLifestyleMenShoes(){
        $cartCount = Cart::content()->count();
        $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 3);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
        return view('users.product-listing', compact('products', 'cartCount'));
    }

    public function showLifestyleWomenShoes(){
        $cartCount = Cart::content()->count();
        $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 4);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
        return view('users.product-listing', compact('products', 'cartCount'));
    }

    public function showRunningMenShoes(){
        $cartCount = Cart::content()->count();
        $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 5);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
        return view('users.product-listing', compact('products', 'cartCount'));
    }

    public function showRunningWomenShoes(){
        $cartCount = Cart::content()->count();
        $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 6);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
        return view('users.product-listing', compact('products', 'cartCount'));
    }

    public function showTrainingMenShoes(){
        $cartCount = Cart::content()->count();
        $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 9);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
        return view('users.product-listing', compact('products', 'cartCount'));
    }

    public function showTrainingWomenShoes(){
        $cartCount = Cart::content()->count();
        $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 10);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
        return view('users.product-listing', compact('products', 'cartCount'));
    }

    public function showFootballMenShoes(){
        $cartCount = Cart::content()->count();
        $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 7);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
        return view('users.product-listing', compact('products', 'cartCount'));
    }

    public function showFootballWomenShoes(){
        $cartCount = Cart::content()->count();
        $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 8);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
        return view('users.product-listing', compact('products', 'cartCount'));
    }

    public function showNikeMenShoes(){
        $cartCount = Cart::content()->count();
        $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.parent_id', 1);
                            })
                            ->whereHas('brand', function ($query) {
                                $query->where('brands.brand_name','like','Nike');
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
        return view('users.product-listing', compact('products', 'cartCount'));
    }

    public function showNikeWomenShoes(){
        $cartCount = Cart::content()->count();
        $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.parent_id', 2);
                            })
                            ->whereHas('brand', function ($query) {
                                $query->where('brands.brand_name','like','Nike');
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
        return view('users.product-listing', compact('products', 'cartCount'));
    }

    public function showAdidasMenShoes(){
        $cartCount = Cart::content()->count();
        $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.parent_id', 1);
                            })
                            ->whereHas('brand', function ($query) {
                                $query->where('brands.brand_name','like','Adidas');
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
        return view('users.product-listing', compact('products', 'cartCount'));
    }

    public function showAdidasWomenShoes(){
        $cartCount = Cart::content()->count();
        $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.parent_id', 2);
                            })
                            ->whereHas('brand', function ($query) {
                                $query->where('brands.brand_name','like','Adidas');
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
        return view('users.product-listing', compact('products', 'cartCount'));
    }
}
