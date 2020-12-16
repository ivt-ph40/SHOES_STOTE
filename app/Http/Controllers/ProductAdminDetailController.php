<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Brand;
use App\ProductDetail;
class ProductAdminDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($code)
    {
        $product = Product::where('product_code','=',$code)->first();
        $productsDetail = ProductDetail::where('product_id','=',$product['id'])->get();

        return view('productdetail.list',compact('productsDetail','product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $product = Product::find($id);
        //dd($id);
        return view('productdetail.create',compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if ($data['quantity']>0) {
            $data['product_status'] = "in stock";
    
        } else {
            $data['product_status'] = "out of stock";
        }
        ProductDetail::create($data);
        return redirect()->route('productdetail.list',$data['product_code']);
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
    public function edit($id,$product_id)
    {
        $productDetail = ProductDetail::find($id);
        $product = Product::find($product_id);
        return view('productdetail.edit', compact('productDetail','product'));
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
        $data = $request->except('_token', '_method');
        if ($data['quantity']>0) {
            $data['product_status'] = "in stock";
    
        } else {
            $data['product_status'] = "out of stock";
        }
        ProductDetail::find($id)->update($data);
        return redirect()->route('productdetail.list',$data['product_code'])->with('message', 'Update User Success !');//cau event hien thi sau khi update
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($code)
    {
        $products = Product::find($code);
        $products->delete();
        return Redirect() -> route('productdetail.list')->with('message', 'Delete User Success !');
    }
}
