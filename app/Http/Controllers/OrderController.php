<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\Address;
use App\ProductDetail;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart as Cart;
use App\Http\Requests\CreateOrderRequest;

class OrderController extends Controller
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
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function showOrderInfo(){
        $cart = Cart::content();
        $totalAmount = Cart::priceTotal();
        $cartCount = Cart::content()->count();
        return view('users.checkout', compact('cart', 'totalAmount', 'cartCount'));
    }

    public function submitOrder(CreateOrderRequest $request){
        $user_id = $request->get('user_id');
        if( $user_id != null){
            $data = $request->all();
            $cart = Cart::content();
            if(Cart::count() >= 1){
                $data['user_id'] = $user_id;
                $data['order_code'] = $this->genString();
                $orderAddress = Address::where('user_id', $user_id)->get();
                $data['ship_address_id'] = $orderAddress->first()->id;
                $order = Order::create($data);
                foreach($cart as $itemCart){
                    $orderDetail = [
                        'order_id' => $order->id,
                        'product_id' => $itemCart->id,
                        'size' => $itemCart->options->size,
                        'color' => $itemCart->options->color,
                        'price' => $itemCart->price,
                        'quantity' => $itemCart->qty,
                    ];
                    OrderDetail::create($orderDetail);
                    $oldQuantity = ProductDetail::where('product_id', $itemCart->id)
                                            ->where('size', $itemCart->options->size)
                                            ->select('quantity')
                                            ->get();
                    $newQuantity = $oldQuantity->first()->quantity - $itemCart->qty;
                    if($newQuantity == 0){
                        ProductDetail::where('product_id', $itemCart->id)
                                    ->where('size', $itemCart->options->size)
                                    ->update(
                                        array(
                                            'quantity' => $newQuantity,
                                            'product_status' => 'out of stock',
                                        ));
                    }else{
                        ProductDetail::where('product_id', $itemCart->id)
                                    ->where('size', $itemCart->options->size)
                                    ->update(
                                        array(
                                            'quantity' => $newQuantity,
                                    ));
                    }
                }
                $totalAmount = Cart::priceTotal();
                $this->sendOrderConfirmationMail($data, $cart, $totalAmount);
                return redirect()->route('cart_remove');
            }
            else{
                return redirect()->route('checkout')->with('error', 'There is nothing to order!')->withInput();
            }
        }
        else{
            $data = $request->all();
            $cart = Cart::content();
            if(Cart::count() >= 1){
                $data['order_code'] = $this->genString();
                $orderAddress = Address::create($data);
                $data['ship_address_id'] = $orderAddress->id;
                $order = Order::create($data);
                foreach($cart as $itemCart){
                    $orderDetail = [
                        'order_id' => $order->id,
                        'product_id' => $itemCart->id,
                        'size' => $itemCart->options->size,
                        'color' => $itemCart->options->color,
                        'price' => $itemCart->price,
                        'quantity' => $itemCart->qty,
                    ];
                    OrderDetail::create($orderDetail);
                    $oldQuantity = ProductDetail::where('product_id', $itemCart->id)
                                            ->where('size', $itemCart->options->size)
                                            ->select('quantity')
                                            ->get();
                    $newQuantity = $oldQuantity->first()->quantity - $itemCart->qty;
                    if($newQuantity == 0){
                        ProductDetail::where('product_id', $itemCart->id)
                                    ->where('size', $itemCart->options->size)
                                    ->update(
                                        array(
                                            'quantity' => $newQuantity,
                                            'product_status' => 'out of stock',
                                        ));
                    }else{
                        ProductDetail::where('product_id', $itemCart->id)
                                    ->where('size', $itemCart->options->size)
                                    ->update(
                                        array(
                                            'quantity' => $newQuantity,
                                    ));
                    }
                }
                $totalAmount = Cart::priceTotal();
                $this->sendOrderConfirmationMail($data, $cart, $totalAmount);
                return redirect()->route('cart_remove');
            }
            else{
                return redirect()->route('checkout')->with('error', 'There is nothing to order!')->withInput();
            }
        }


    }

    public function genString() {
        $length = 10;
        $randomBytes = openssl_random_pseudo_bytes($length);
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randString = '';
        for ($i = 0; $i < $length; $i++)
            $randString .= $characters[ord($randomBytes[$i]) % $charactersLength];
        return $randString;
    }

    public function sendOrderConfirmationMail($orderInfo, $cart, $totalAmount){
        $toEmail = $orderInfo['email'];
        $fromEmail ='admin@gmail.com';
        $username = $orderInfo['username'];
        $data =['username' => $username, 'orderInfo' => $orderInfo, 'cart' => $cart, 'totalAmount' => $totalAmount];
        \Mail::send('mails.order-confirmation', $data, function($message) use ($toEmail, $fromEmail, $username){
            $message->to($toEmail, $username);
            $message->subject('Order Confirmation Mail');
        });
    }
}
