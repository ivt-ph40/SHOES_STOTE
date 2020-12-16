<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart as Cart;
use Illuminate\Support\Facades\Route;
use App\Review;
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
        $cartCount = Cart::content()->count();
        $product = Product::with('images','product_details', 'brand')->find($id);
        $reviews = Review::with('product', 'user')
                            ->whereHas('product', function ($query) use($id){
                                $query->where('products.id', $id);
                            })
                            ->get();
        $relatedItems = Product::with('images','category')
                            ->whereNotIn('products.id', [$id])
                            ->get();
        return view('users.product-detail', compact('product', 'relatedItems', 'reviews','cartCount'));
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
    public function search(Request $request){
        $products = Product::with('images')
                            ->where('products.product_name', 'like', '%'. $request->input('input-search'). '%')
                            ->orderBy('products.id', 'ASC')
                            ->get();
        $cartCount = Cart::content()->count();
        if($products->first() != null){
            return view('users.product-listing', compact('products', 'cartCount'));
        }else{
            return redirect()->back()->with('message', 'Not found!')->withInput();
        }

    }

    public function showAllMenShoes(Request $request){
        $cartCount = Cart::content()->count();

        switch($request->get('sort')){
            case 'name':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.parent_id', 1);
                            })
                            ->orderBy('products.product_name', 'ASC')
                            ->get();
                break;
            case 'price_asc':
            $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.parent_id', 1);
                            })
                            ->orderBy('products.price', 'ASC')
                            ->get();
                break;
            case 'price_desc':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.parent_id', 1);
                            })
                            ->orderBy('products.price', 'DESC')
                            ->get();
                break;
            case 'category_lifestyle':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.parent_id', 1)
                                        ->whereIn('categories.id', [3,4]);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            case 'category_running':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.parent_id', 1)
                                        ->whereIn('categories.id', [5,6]);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            case 'category_football':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.parent_id', 1)
                                        ->whereIn('categories.id', [7,8]);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            case 'category_training':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.parent_id', 1)
                                        ->whereIn('categories.id', [9,10]);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            default:
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.parent_id', 1);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
        }

        return view('users.product-listing', compact('products', 'cartCount'));
    }

    public function showAllWomenShoes(Request $request){
        $cartCount = Cart::content()->count();

        switch($request->get('sort')){
            case 'name':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.parent_id', 2);
                            })
                            ->orderBy('products.product_name', 'ASC')
                            ->get();
                break;
            case 'price_asc':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.parent_id', 2);
                            })
                            ->orderBy('products.price', 'ASC')
                            ->get();
                break;
            case 'price_desc':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.parent_id', 2);
                            })
                            ->orderBy('products.price', 'DESC')
                            ->get();
                break;
            case 'category_lifestyle':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.parent_id', 2)
                                        ->whereIn('categories.id', [3,4]);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            case 'category_running':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.parent_id', 2)
                                        ->whereIn('categories.id', [5,6]);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            case 'category_football':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.parent_id', 2)
                                        ->whereIn('categories.id', [7,8]);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            case 'category_training':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.parent_id', 2)
                                        ->whereIn('categories.id', [9,10]);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            default:
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.parent_id', 2);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
        }

        return view('users.product-listing', compact('products', 'cartCount'));
    }

    public function showLifestyleMenShoes(Request $request){
        $cartCount = Cart::content()->count();

        switch($request->get('sort')){
            case 'name':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 3);
                            })
                            ->orderBy('products.product_name', 'ASC')
                            ->get();
                break;
            case 'price_asc':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 3);
                            })
                            ->orderBy('products.price', 'ASC')
                            ->get();
                break;
            case 'price_desc':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 3);
                            })
                            ->orderBy('products.price', 'DESC')
                            ->get();
                break;
            case 'category_lifestyle':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 3)
                                        ->whereIn('categories.id', [3,4]);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            case 'category_running':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 3)
                                        ->whereIn('categories.id', [5,6]);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            case 'category_football':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 3)
                                        ->whereIn('categories.id', [7,8]);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            case 'category_training':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 3)
                                        ->whereIn('categories.id', [9,10]);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            default:
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 3);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
        }

        return view('users.product-listing', compact('products', 'cartCount'));
    }

    public function showLifestyleWomenShoes(Request $request){
        $cartCount = Cart::content()->count();

        switch($request->get('sort')){
            case 'name':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 4);
                            })
                            ->orderBy('products.product_name', 'ASC')
                            ->get();
                break;
            case 'price_asc':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 4);
                            })
                            ->orderBy('products.price', 'ASC')
                            ->get();
                break;
            case 'price_desc':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 4);
                            })
                            ->orderBy('products.price', 'DESC')
                            ->get();
                break;
            case 'category_lifestyle':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 4)
                                        ->whereIn('categories.id', [3,4]);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            case 'category_running':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 4)
                                        ->whereIn('categories.id', [5,6]);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            case 'category_football':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 4)
                                        ->whereIn('categories.id', [7,8]);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            case 'category_training':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 4)
                                        ->whereIn('categories.id', [9,10]);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            default:
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 4);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
        }

        return view('users.product-listing', compact('products', 'cartCount'));
    }

    public function showRunningMenShoes(Request $request){
        $cartCount = Cart::content()->count();

        switch($request->get('sort')){
            case 'name':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 5);
                            })
                            ->orderBy('products.product_name', 'ASC')
                            ->get();
                break;
            case 'price_asc':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 5);
                            })
                            ->orderBy('products.price', 'ASC')
                            ->get();
                break;
            case 'price_desc':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 5);
                            })
                            ->orderBy('products.price', 'DESC')
                            ->get();
                break;
            case 'category_lifestyle':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 5)
                                        ->whereIn('categories.id', [3,4]);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            case 'category_running':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 5)
                                        ->whereIn('categories.id', [5,6]);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            case 'category_football':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 5)
                                        ->whereIn('categories.id', [7,8]);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            case 'category_training':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 5)
                                        ->whereIn('categories.id', [9,10]);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            default:
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 5);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
        }
        return view('users.product-listing', compact('products', 'cartCount'));
    }

    public function showRunningWomenShoes(Request $request){
        $cartCount = Cart::content()->count();

        switch($request->get('sort')){
            case 'name':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 6);
                            })
                            ->orderBy('products.product_name', 'ASC')
                            ->get();
                break;
            case 'price_asc':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 6);
                            })
                            ->orderBy('products.price', 'ASC')
                            ->get();
                break;
            case 'price_desc':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 6);
                            })
                            ->orderBy('products.price', 'DESC')
                            ->get();
                break;
            case 'category_lifestyle':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 6)
                                        ->whereIn('categories.id', [3,4]);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            case 'category_running':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 6)
                                        ->whereIn('categories.id', [5,6]);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            case 'category_football':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 6)
                                        ->whereIn('categories.id', [7,8]);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            case 'category_training':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 6)
                                        ->whereIn('categories.id', [9,10]);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            default:
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 6);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
        }

        return view('users.product-listing', compact('products', 'cartCount'));
    }

    public function showTrainingMenShoes(Request $request){
        $cartCount = Cart::content()->count();

        switch($request->get('sort')){
            case 'name':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 9);
                            })
                            ->orderBy('products.product_name', 'ASC')
                            ->get();
                break;
            case 'price_asc':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 9);
                            })
                            ->orderBy('products.price', 'ASC')
                            ->get();
                break;
            case 'price_desc':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 9);
                            })
                            ->orderBy('products.price', 'DESC')
                            ->get();
                break;
            case 'category_lifestyle':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 9)
                                        ->whereIn('categories.id', [3,4]);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            case 'category_running':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 9)
                                        ->whereIn('categories.id', [5,6]);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            case 'category_football':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 9)
                                        ->whereIn('categories.id', [7,8]);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            case 'category_training':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 9)
                                        ->whereIn('categories.id', [9,10]);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            default:
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 9);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
        }

        return view('users.product-listing', compact('products', 'cartCount'));
    }

    public function showTrainingWomenShoes(Request $request){
        $cartCount = Cart::content()->count();

        switch($request->get('sort')){
            case 'name':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 10);
                            })
                            ->orderBy('products.product_name', 'ASC')
                            ->get();
                break;
            case 'price_asc':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 10);
                            })
                            ->orderBy('products.price', 'ASC')
                            ->get();
                break;
            case 'price_desc':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 10);
                            })
                            ->orderBy('products.price', 'DESC')
                            ->get();
                break;
            case 'category_lifestyle':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 10)
                                        ->whereIn('categories.id', [3,4]);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            case 'category_running':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 10)
                                        ->whereIn('categories.id', [5,6]);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            case 'category_football':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 10)
                                        ->whereIn('categories.id', [7,8]);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            case 'category_training':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 10)
                                        ->whereIn('categories.id', [9,10]);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            default:
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 10);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
        }

        return view('users.product-listing', compact('products', 'cartCount'));
    }

    public function showFootballMenShoes(Request $request){
        $cartCount = Cart::content()->count();

        switch($request->get('sort')){
            case 'name':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 7);
                            })
                            ->orderBy('products.product_name', 'ASC')
                            ->get();
                break;
            case 'price_asc':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 7);
                            })
                            ->orderBy('products.price', 'ASC')
                            ->get();
                break;
            case 'price_desc':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 7);
                            })
                            ->orderBy('products.price', 'DESC')
                            ->get();
                break;
            case 'category_lifestyle':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 7)
                                        ->whereIn('categories.id', [3,4]);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            case 'category_running':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 7)
                                        ->whereIn('categories.id', [5,6]);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            case 'category_football':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 7)
                                        ->whereIn('categories.id', [7,8]);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            case 'category_training':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 7)
                                        ->whereIn('categories.id', [9,10]);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            default:
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 7);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
        }

        return view('users.product-listing', compact('products', 'cartCount'));
    }

    public function showFootballWomenShoes(Request $request){
        $cartCount = Cart::content()->count();

        switch($request->get('sort')){
            case 'name':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 8);
                            })
                            ->orderBy('products.product_name', 'ASC')
                            ->get();
                break;
            case 'price_asc':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 8);
                            })
                            ->orderBy('products.price', 'ASC')
                            ->get();
                break;
            case 'price_desc':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 8);
                            })
                            ->orderBy('products.price', 'DESC')
                            ->get();
                break;
            case 'category_lifestyle':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 8)
                                        ->whereIn('categories.id', [3,4]);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            case 'category_running':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 8)
                                        ->whereIn('categories.id', [5,6]);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            case 'category_football':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 8)
                                        ->whereIn('categories.id', [7,8]);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            case 'category_training':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 8)
                                        ->whereIn('categories.id', [9,10]);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            default:
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 8);
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
        }

        return view('users.product-listing', compact('products', 'cartCount'));
    }

    public function showNikeMenShoes(Request $request){
        $cartCount = Cart::content()->count();

        switch($request->get('sort')){
            case 'name':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.parent_id', 1);
                            })
                            ->whereHas('brand', function ($query) {
                                $query->where('brands.brand_name','like','Nike');
                            })
                            ->orderBy('products.product_name', 'ASC')
                            ->get();
                break;
            case 'price_asc':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.parent_id', 1);
                            })
                            ->whereHas('brand', function ($query) {
                                $query->where('brands.brand_name','like','Nike');
                            })
                            ->orderBy('products.price', 'ASC')
                            ->get();
                break;
            case 'price_desc':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.parent_id', 1);
                            })
                            ->whereHas('brand', function ($query) {
                                $query->where('brands.brand_name','like','Nike');
                            })
                            ->orderBy('products.price', 'DESC')
                            ->get();
                break;
            case 'category_lifestyle':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 3);
                            })
                            ->whereHas('brand', function ($query) {
                                $query->where('brands.brand_name','like','Nike');
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            case 'category_running':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 5);
                            })
                            ->whereHas('brand', function ($query) {
                                $query->where('brands.brand_name','like','Nike');
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            case 'category_football':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 7);
                            })
                            ->whereHas('brand', function ($query) {
                                $query->where('brands.brand_name','like','Nike');
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            case 'category_training':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 9);
                            })
                            ->whereHas('brand', function ($query) {
                                $query->where('brands.brand_name','like','Nike');
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            default:
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.parent_id', 1);
                            })
                            ->whereHas('brand', function ($query) {
                                $query->where('brands.brand_name','like','Nike');
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
        }

        return view('users.product-listing', compact('products', 'cartCount'));
    }

    public function showNikeWomenShoes(Request $request){
        $cartCount = Cart::content()->count();

        switch($request->get('sort')){
            case 'name':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.parent_id', 2);
                            })
                            ->whereHas('brand', function ($query) {
                                $query->where('brands.brand_name','like','Nike');
                            })
                            ->orderBy('products.product_name', 'ASC')
                            ->get();
                break;
            case 'price_asc':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.parent_id', 2);
                            })
                            ->whereHas('brand', function ($query) {
                                $query->where('brands.brand_name','like','Nike');
                            })
                            ->orderBy('products.price', 'ASC')
                            ->get();
                break;
            case 'price_desc':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.parent_id', 2);
                            })
                            ->whereHas('brand', function ($query) {
                                $query->where('brands.brand_name','like','Nike');
                            })
                            ->orderBy('products.price', 'DESC')
                            ->get();
                break;
            case 'category_lifestyle':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 4);
                            })
                            ->whereHas('brand', function ($query) {
                                $query->where('brands.brand_name','like','Nike');
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            case 'category_running':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 6);
                            })
                            ->whereHas('brand', function ($query) {
                                $query->where('brands.brand_name','like','Nike');
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            case 'category_football':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 8);
                            })
                            ->whereHas('brand', function ($query) {
                                $query->where('brands.brand_name','like','Nike');
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            case 'category_training':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 10);
                            })
                            ->whereHas('brand', function ($query) {
                                $query->where('brands.brand_name','like','Nike');
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            default:
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.parent_id', 2);
                            })
                            ->whereHas('brand', function ($query) {
                                $query->where('brands.brand_name','like','Nike');
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
        }

        return view('users.product-listing', compact('products', 'cartCount'));
    }

    public function showAdidasMenShoes(Request $request){
        $cartCount = Cart::content()->count();

        switch($request->get('sort')){
            case 'name':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.parent_id', 1);
                            })
                            ->whereHas('brand', function ($query) {
                                $query->where('brands.brand_name','like','Adidas');
                            })
                            ->orderBy('products.product_name', 'ASC')
                            ->get();
                break;
            case 'price_asc':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.parent_id', 1);
                            })
                            ->whereHas('brand', function ($query) {
                                $query->where('brands.brand_name','like','Adidas');
                            })
                            ->orderBy('products.price', 'ASC')
                            ->get();
                break;
            case 'price_desc':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.parent_id', 1);
                            })
                            ->whereHas('brand', function ($query) {
                                $query->where('brands.brand_name','like','Adidas');
                            })
                            ->orderBy('products.price', 'DESC')
                            ->get();
                break;
            case 'category_lifestyle':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 3);
                            })
                            ->whereHas('brand', function ($query) {
                                $query->where('brands.brand_name','like','Adidas');
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            case 'category_running':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 5);
                            })
                            ->whereHas('brand', function ($query) {
                                $query->where('brands.brand_name','like','Adidas');
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            case 'category_football':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 7);
                            })
                            ->whereHas('brand', function ($query) {
                                $query->where('brands.brand_name','like','Adidas');
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            case 'category_training':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 9);
                            })
                            ->whereHas('brand', function ($query) {
                                $query->where('brands.brand_name','like','Adidas');
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            default:
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.parent_id', 1);
                            })
                            ->whereHas('brand', function ($query) {
                                $query->where('brands.brand_name','like','Adidas');
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
        }

        return view('users.product-listing', compact('products', 'cartCount'));
    }

    public function showAdidasWomenShoes(Request $request){
        $cartCount = Cart::content()->count();

        switch($request->get('sort')){
            case 'name':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.parent_id', 2);
                            })
                            ->whereHas('brand', function ($query) {
                                $query->where('brands.brand_name','like','Adidas');
                            })
                            ->orderBy('products.product_name', 'ASC')
                            ->get();
                break;
            case 'price_asc':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.parent_id', 2);
                            })
                            ->whereHas('brand', function ($query) {
                                $query->where('brands.brand_name','like','Adidas');
                            })
                            ->orderBy('products.price', 'ASC')
                            ->get();
                break;
            case 'price_desc':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.parent_id', 2);
                            })
                            ->whereHas('brand', function ($query) {
                                $query->where('brands.brand_name','like','Adidas');
                            })
                            ->orderBy('products.price', 'DESC')
                            ->get();
                break;
            case 'category_lifestyle':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 4);
                            })
                            ->whereHas('brand', function ($query) {
                                $query->where('brands.brand_name','like','Adidas');
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            case 'category_running':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 6);
                            })
                            ->whereHas('brand', function ($query) {
                                $query->where('brands.brand_name','like','Adidas');
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            case 'category_football':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 8);
                            })
                            ->whereHas('brand', function ($query) {
                                $query->where('brands.brand_name','like','Adidas');
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            case 'category_training':
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.id', 10);
                            })
                            ->whereHas('brand', function ($query) {
                                $query->where('brands.brand_name','like','Adidas');
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
            default:
                $products = Product::with('images')
                            ->whereHas('category', function ($query) {
                                $query->where('categories.parent_id', 2);
                            })
                            ->whereHas('brand', function ($query) {
                                $query->where('brands.brand_name','like','Adidas');
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
                break;
        }

        return view('users.product-listing', compact('products', 'cartCount'));
    }


}
