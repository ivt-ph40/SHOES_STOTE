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
    public function showCart(){
        $cart = Cart::content();
        $totalAmount = Cart::priceTotal();
        return view('users.cart', compact('cart', 'totalAmount'));
    }
    public function cart(Request $request) {
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
        $product_id = $request->get('product_id');
        if ($product_id && ($request->get('increment')) == 1) {
            $rowId = Cart::search(array('id' => $product_id));
            $item = Cart::get($rowId[0]);
            $add = $item->qty+1;
            Cart::update($rowId[0], $add);
        }
        if ($product_id && ($request->get('decrease')) == 1) {
            $rowId = Cart::search(array('id' => $product_id));
            $item = Cart::get($rowId[0]);
            $sub = $item->qty-1;
            Cart::update($rowId[0], $sub);
        }
        if ($product_id && ($request->get('remove')) == 1) {
            $rowId = Cart::search(array('id' => $product_id));

            Cart::remove($rowId[0]);
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
