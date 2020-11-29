<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use DB;

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
        $product = Product::with('images','product_details', 'brand')->find($id);
        $relatedItems = Product::with('images','category')
                            ->whereNotIn('products.id', [$id])
                            ->get();
        return view('users.product-detail', compact('product', 'relatedItems'));
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
        $products = Product::with('images')
                    ->join('categories', function($join){
                        $join->on('products.category_id', '=', 'categories.id')
                            ->where('categories.parent_id',1);
                    })
                    ->orderBy('products.id', 'ASC')
                    ->get();
        // dd(DB::getQueryLog());
        // dd($products->toArray());
        return view('users.product-listing', compact('products'));
    }

    public function showAllWomenShoes(){
        $products = Product::with('images')
                        ->join('categories', function($join){
                            $join->on('products.category_id', '=', 'categories.id')
                                ->where('categories.parent_id',2);
                        })
                        ->orderBy('products.id', 'ASC')
                        ->get();
        return view('users.product-listing', compact('products'));
    }

    public function showLifestyleMenShoes(){
        $products = Product::with('images')
                        ->join('categories', function($join){
                            $join->on('products.category_id', '=', 'categories.id')
                                ->where('categories.id',3);
                        })
                        ->orderBy('products.id', 'ASC')
                        ->get();
        return view('users.product-listing', compact('products'));
    }

    public function showLifestyleWomenShoes(){
        $products = Product::with('images')
                        ->join('categories', function($join){
                            $join->on('products.category_id', '=', 'categories.id')
                                ->where('categories.id',4);
                        })
                        ->orderBy('products.id', 'ASC')
                        ->get();
        return view('users.product-listing', compact('products'));
    }

    public function showRunningMenShoes(){
        $products = Product::with('images')
                        ->join('categories', function($join){
                            $join->on('products.category_id', '=', 'categories.id')
                                ->where('categories.id',5);
                        })
                        ->orderBy('products.id', 'ASC')
                        ->get();
        return view('users.product-listing', compact('products'));
    }

    public function showRunningWomenShoes(){
        $products = Product::with('images')
                        ->join('categories', function($join){
                            $join->on('products.category_id', '=', 'categories.id')
                                ->where('categories.id',6);
                        })
                        ->orderBy('products.id', 'ASC')
                        ->get();
        return view('users.product-listing', compact('products'));
    }

    public function showTrainingMenShoes(){
        $products = Product::with('images')
                        ->join('categories', function($join){
                            $join->on('products.category_id', '=', 'categories.id')
                                ->where('categories.id',9);
                        })
                        ->orderBy('products.id', 'ASC')
                        ->get();
        return view('users.product-listing', compact('products'));
    }

    public function showTrainingWomenShoes(){
        $products = Product::with('images')
                        ->join('categories', function($join){
                            $join->on('products.category_id', '=', 'categories.id')
                                ->where('categories.id',10);
                        })
                        ->orderBy('products.id', 'ASC')
                        ->get();
        return view('users.product-listing', compact('products'));
    }

    public function showFootballMenShoes(){
        $products = Product::with('images')
                        ->join('categories', function($join){
                            $join->on('products.category_id', '=', 'categories.id')
                                ->where('categories.id',7);
                        })
                        ->orderBy('products.id', 'ASC')
                        ->get();
        return view('users.product-listing', compact('products'));
    }

    public function showFootballWomenShoes(){
        $products = Product::with('images')
                        ->join('categories', function($join){
                            $join->on('products.category_id', '=', 'categories.id')
                                ->where('categories.id',8);
                        })
                        ->orderBy('products.id', 'ASC')
                        ->get();
        return view('users.product-listing', compact('products'));
    }

    public function showNikeMenShoes(){
        $products = Product::with('images')
                        ->join('categories', function($join){
                            $join->on('products.category_id', '=', 'categories.id')
                                ->whereIn('categories.id',[3,5,7,9]);
                        })
                        ->join('brands', function($join){
                            $join->on('products.brand_id', '=', 'brands.id')
                                ->where('brands.brand_name','Nike');
                        })
                        ->orderBy('products.id', 'ASC')
                        ->get();
        return view('users.product-listing', compact('products'));
    }

    public function showNikeWomenShoes(){
        $products = Product::with('images')
                        ->join('categories', function($join){
                            $join->on('products.category_id', '=', 'categories.id')
                                ->whereIn('categories.id',[4,6,8,10]);
                        })
                        ->join('brands', function($join){
                            $join->on('products.brand_id', '=', 'brands.id')
                                ->where('brands.brand_name','Nike');
                        })
                        ->orderBy('products.id', 'ASC')
                        ->get();
        return view('users.product-listing', compact('products'));
    }

    public function showAdidasMenShoes(){
        $products = Product::with('images')
                        ->join('categories', function($join){
                            $join->on('products.category_id', '=', 'categories.id')
                                ->whereIn('categories.id',[3,5,7,9]);
                        })
                        ->join('brands', function($join){
                            $join->on('products.brand_id', '=', 'brands.id')
                                ->where('brands.brand_name','Adidas');
                        })
                        ->orderBy('products.id', 'ASC')
                        ->get();
        return view('users.product-listing', compact('products'));
    }

    public function showAdidasWomenShoes(){
        $products = Product::with('images')
                        ->join('categories', function($join){
                            $join->on('products.category_id', '=', 'categories.id')
                                ->whereIn('categories.id',[4,6,8,10]);
                        })
                        ->join('brands', function($join){
                            $join->on('products.brand_id', '=', 'brands.id')
                                ->where('brands.brand_name','Adidas');
                        })
                        ->orderBy('products.id', 'ASC')
                        ->get();
        return view('users.product-listing', compact('products'));
    }
}
