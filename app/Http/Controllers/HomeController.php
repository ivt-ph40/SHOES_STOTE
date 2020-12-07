<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart as Cart;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cartCount = Cart::content()->count();
        $allCount = Product::count('id');
        $products = Product::with('images')
                        ->orderBy('id', 'ASC')
                        ->take(8)
                        ->get();
        $saleProducts = Product::with('images')
                        ->where('products.discount_percent', '<>', '0')
                        ->orderBy('id', 'ASC')
                        ->get();
        return view('users.home', compact('allCount', 'products','saleProducts','cartCount'));
    }

}
