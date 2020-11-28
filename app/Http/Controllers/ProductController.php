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
        $product = Product::with('images','product_details', 'brand', 'coupons')->find($id);
        $relatedItems = Product::with('images','category','coupons')
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
        $products = Product::with('images','coupons')
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
        $products = Product::with('images','coupons')
                        ->join('categories', function($join){
                            $join->on('products.category_id', '=', 'categories.id')
                                ->where('categories.parent_id',2);
                        })
                        ->orderBy('products.id', 'ASC')
                        ->get();
        return view('users.product-listing', compact('products'));
    }
}
