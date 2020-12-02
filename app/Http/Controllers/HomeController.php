<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart as Cart;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // DB::enableQueryLog();
        $cartCount = Cart::content()->count();
        $allCount = Product::count('id');
        $nikeCount = Product::whereHas('brand', function ($query) {
                            $query->where('brands.brand_name','like','Nike');
                        })->count();
        $adidasCount = Product::whereHas('brand', function ($query) {
                            $query->where('brands.brand_name','like','Adidas');
                        })->count();
        $menCount = Product::whereHas('category', function ($query) {
                            $query->where('categories.parent_id', 1);
                        })->count();
        $womenCount = Product::whereHas('category', function ($query) {
                            $query->where('categories.parent_id', 2);
                        })->count();
        $allProducts = Product::with('images')
                        ->orderBy('id', 'ASC')
                        ->get();
        $saleProducts = Product::with('images')
                        ->where('products.discount_percent', '<>', '0')
                        ->orderBy('id', 'ASC')
                        ->get();
        // dd(DB::getQueryLog());
        return view('users.home', compact('allCount', 'nikeCount', 'adidasCount', 'menCount', 'womenCount', 'allProducts','saleProducts','cartCount'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
