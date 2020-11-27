<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Session;
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

    // /**
    //  * Add product to the cart
    //  *
    //  * @return success message
    //  */
    // public function addToCart(Request $request, $id)
    // {
    //     $product = Product::with('images')->find($id);
    //     $cart = Session::get('cart');

    //     // if(!isset($cart[$product['productID']])):
    //         $cart[$product[0]->$request->productID] = array(
    //             "id" => $product[0]->$request->productID,
    //             "product_name" => $product[0]->product_name,
    //             "product_code" => $product[0]->product_code,
    //             "color" => $product[0]->color,
    //             "size" => $product[0]->size,
    //             "quantity" => $product[0]->quantity,
    //             "price" => $product[0]->price,
    //             "product_image" => $product[0]->image,
    //         );

    //     // else:
    //     //     $cart[$product['id']]['quantity'] += $product->quantity;
    //     // endif;

    //     Session::put('cart', $cart);
    //     // Session::flash('success','Item successfully added to cart!');
    //     //dd(Session::get('cart'));
    //     return redirect()->back()->with('success-msg','Item successfully added to cart!');
    // }

    // public function updateCart(Request $cartdata)
    // {
    //     $cart = Session::get('cart');

    //     foreach ($cartdata->all() as $id => $val)
    //     {
    //         if ($val > 0) {
    //             $cart[$id]['qty'] += $val;
    //         } else {
    //             unset($cart[$id]);
    //         }
    //     }
    //     Session::put('cart', $cart);
    //     return redirect()->back();
    // }

    // public function deleteCart($id)
    // {
    //     $cart = Session::get('cart');
    //     unset($cart[$id]);
    //     Session::put('cart', $cart);
    //     return redirect()->back();
    // }
}
