<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderDetail;
use App\Address;
use App\DeliverySatus;
use App\DeliveryStatus;
use App\User;

class OrderAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($name)
    {
        $orders = Order::with('deliver_status','user')
                            ->join('delivery_statuses',function($join){
                                $join->on('orders.delivery_status_id', '=', 'delivery_statuses.id');
                            })
                            ->join('users',function($join){
                                $join->on('orders.user_id', '=', 'users.id');
                            })
                            ->get();
        $statuss = DeliveryStatus::all();
        return view('order.list',compact('orders','statuss','name'));
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
    public function show($code,$nameUser,$name)
    {
        $order = Order::where('order_code','=',$code)->first();
        $codeOder = $order['order_code'];
        $orderdeital = OrderDetail::with('product')
                        ->join('products',function($join){
                            $join->on('order_details.product_id', '=', 'products.id');
                        })
                        ->where('order_id','=',$order['id'])
                        ->get();
        return view('order.listdetail',compact('orderdeital','name','nameUser','codeOder'));
        
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
    public function update(Request $request,$code,$name)
    {
        $data = $request->except('_token', '_method');
        Order::where('order_code','=',$code)->update($data);
        return redirect()->route('order.list',$name)->with('message', 'Update User Success !');//cau event hien thi sau khi update
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
    
    //SEARCH
    public function search(Request $request,$name){
        $search = $request->input('search');
        $orders = Order::where(function($query) use ($search) {
                $user = User::where('email', 'LIKE', '%'. $search . '%')->pluck('id');

                $query->where('order_code', 'LIKE', '%' . $search . '%')
                      ->orWhereIn('user_id', $user);
            })
            ->with('deliver_status','user')
            ->join('delivery_statuses',function($join){
                $join->on('orders.delivery_status_id', '=', 'delivery_statuses.id');
            })
            ->join('users',function($join){
                $join->on('orders.user_id', '=', 'users.id');
            })
            ->get();
        $statuss = DeliveryStatus::all();
        return view('order.list',compact('orders','statuss','name'));
    }

    // SORT
    public function sort(Request $request,$name){
        $sort = $request->input('sort');
        $Order1 = Order::with('deliver_status','user')
        ->join('delivery_statuses',function($join){
            $join->on('orders.delivery_status_id', '=', 'delivery_statuses.id');
        })
        ->join('users',function($join){
            $join->on('orders.user_id', '=', 'users.id');
        })
        ->get();
   
        
        if($sort == 'date-up'){
            $orders = $Order1->sortBy('created_at');
            $orders->values()->all();
        } 
        else {
            $orders = $Order1->sortByDesc('created_at');
            $orders->values()->all();
        }
        $statuss = DeliveryStatus::all();
        return view('order.list',compact('orders','statuss','name'));
    }
}