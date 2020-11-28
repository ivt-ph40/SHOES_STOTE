<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Product;
// use Request;

class CartController extends Controller
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
    public function showCart(Request $request){
        // Cart::destroy();
        $product_id = $request->get('product_id');
        if ($product_id && $request->get('increment')) {
            $rowId = Cart::search(function ($cartItem, $rowId) use ($product_id){
                // dd($cartItem);
                return $cartItem->id == $product_id;
            });
            // dd($rowId->first()->rowId);
            $item = Cart::get($rowId->first()->rowId);
            // dd($item);
            $add = $item->qty+1;
            Cart::update($rowId->first()->rowId, $add);
            // dd(Cart::content());
        }
        if ($product_id && $request->get('decrease')) {
            $rowId = Cart::search(function ($cartItem, $rowId) use ($product_id){
                return $cartItem->id == $product_id;
            });
            $item = Cart::get($rowId->first()->rowId);
            $sub = $item->qty-1;
            Cart::update($rowId->first()->rowId, $sub);
        }
        if ($product_id && $request->get('remove')) {
            $rowId = Cart::search(function ($cartItem, $rowId) use ($product_id){
                return $cartItem->id == $product_id;
            });
            Cart::remove($rowId->first()->rowId);
        }
        $cart = Cart::content();
        $totalAmount = Cart::priceTotal();
        return view('users.cart', compact('cart', 'totalAmount'));
    }

    public function showCartAjax(Request $request){
        $product_id = $request->get('product_id');
        if ($product_id && $request->get('increment')) {
            $rowId = Cart::search(function ($cartItem, $rowId) use ($product_id){
                return $cartItem->id == $product_id;
            });
            $item = Cart::get($rowId->first()->rowId);
            $add = $item->qty+1;
            Cart::update($rowId->first()->rowId, $add);
        }
        if ($product_id && $request->get('decrease')) {
            $rowId = Cart::search(function ($cartItem, $rowId) use ($product_id){
                return $cartItem->id == $product_id;
            });
            $item = Cart::get($rowId->first()->rowId);
            $sub = $item->qty-1;
            Cart::update($rowId->first()->rowId, $sub);
        }
        if ($product_id && $request->get('remove')) {
            $rowId = Cart::search(function ($cartItem, $rowId) use ($product_id){
                return $cartItem->id == $product_id;
            });
            Cart::remove($rowId->first()->rowId);
        }
        $cart = Cart::content();
        $totalAmount = Cart::priceTotal();
        return response()->json(['cart' => $cart, 'totalAmount'=>$totalAmount], 200);
    }


    public function addCart(Request $request) {
        if ($request->isMethod('post')) {
            $product_id = $request->get('product_id');
            $product = Product::with('product_details','brand')->find($product_id);
            Cart::add(
                ['id' => $product['id'],
                'name' => $product['product_name'],
                'qty' => $request->quantity,
                'price' => $product['price'],
                'weight' => '0',
                'options' => [
                            'image' => $product->images[0]['image_name'],
                            'code' => $product['product_code'],
                            'brand' => $product->brand['brand_name'],
                            'color' => $product->product_details[0]['color'],
                            'size' => $request->size,
                            'subTotal' => $request->quantity * $product['price'],
                        ],
            ]);
        }
        $cart = Cart::content();
        $totalAmount = Cart::priceTotal();
        return view('users.cart', compact('cart', 'totalAmount'));
    }

    public function cart_remove()
    {
        Cart::destroy();
        return redirect()->route('show-cart');
    }


    public function checkout()
    {
        $cart = Cart::content();
        return view('users.checkout');
    }
}
