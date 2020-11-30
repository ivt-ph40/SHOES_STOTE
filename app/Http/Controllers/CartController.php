<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart as Cart;

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
        $cart = Cart::content();
        $totalAmount = Cart::priceTotal();
        return view('users.cart', compact('cart', 'totalAmount'));
    }

    public function addCart(Request $request) {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $product_id = $data['product_id'];
            $product = Product::with('product_details','brand')->find($product_id);
            $discountAmount = ($product['discount_percent'] * $product['price'])/100;
            $item = Cart::search(function ($cartItem, $rowId) use ($product_id){
                return $cartItem->id == $product_id;
            })->first();

            if(($item != null) && (!empty($item->rowId))){
                $newQty = $data['quantity'] + $item->qty;
                $newSubTotal = $newQty * $item->price;
                $itemCart = Cart::get($item->rowId);
                $options = $itemCart->options->merge(['subTotal' => $newSubTotal]);
                Cart::update($item->rowId, ['qty' => $newQty, 'price' => $itemCart->price,'options' => $options]);
            }else{
                Cart::add(
                    ['id' => $product['id'],
                    'name' => $product['product_name'],
                    'qty' => $request->quantity,
                    'price' => $product['price'] - $discountAmount,
                    'weight' => '0',
                    'options' => [
                                'image' => $product->images[0]['image_name'],
                                'code' => $product['product_code'],
                                'color' => $product->product_details[0]['color'],
                                'size' => $request->size,
                                'subTotal' => $request->quantity * ($product['price'] - $discountAmount),
                            ],
                ]);
            }

        }
        $cart = Cart::content();
        $totalAmount = Cart::priceTotal();
        return view('users.cart', compact('cart', 'totalAmount'));
    }

    public function cart_remove()
    {
        Cart::destroy();
        return redirect()->away('cart')->with('message', 'Order Successfully!');
    }


    public function checkout()
    {
        $cart = Cart::content();
        return view('users.checkout');
    }


    public function updateQuantity(Request $request)
    {
        $rowId = $request->get('row_id');
        $qty = $request->get('qty');
        $action = $request->get('action');
        $item = Cart::get($rowId);

        $msg = 'No action';
        $status = true;
        $newQty = 0;
        $newSubTotal = 0;

        switch ($action) {
            case 'plus':
                $newQty = $qty + 1;
                break;
            case 'minus':
                $newQty = $qty > 1 ? $qty - 1 : 1; // Keep min 1
                break;
            default:
                $status = false;
                throw new \Exception('Action is invalid');
                break;
        }

        if ($status) {
            $newSubTotal = $newQty * $item->price;
            // Cart::update($rowId, $newQty);
            Cart::update($rowId, $newQty, ['options' => ['subTotal' => $newSubTotal]]);
            $msg = 'Update is success';
        }

        return response()->json([
            'message' => $msg,
            'status' => $status,
            'qty' => $newQty,
            'subTotal' => number_format($newSubTotal),
            'total' => Cart::priceTotal(2, '.', ',')
        ]);
    }
}
