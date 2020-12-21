<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Image;
class ImageProductAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($code,$name)
    {
        $product = Product::where('product_code','=',$code)->first();
        $images = Image::where('product_id','=',$product['id'])->get();
        return view('imageadmin.list',compact('images','product','name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id,$name)
    {
        $product = Product::find($id); // Lấy hãng giày
        return view('imageadmin.create',compact('product','name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$name)
    {
        $data = $request->all();
        $data1= $request->file('image_name');
        $data['image_name'] = time().'_'.$data1->getClientOriginalName();
        //dd($gethinhthe);
        Image::create($data);
        
        //Lưu hình ảnh vào thư mục public/upload/hinhthe
		$image = $request->file('image_name');
		$getimage = time().'_'.$image->getClientOriginalName();
		$destinationPath = public_path('images/shoe');
		$image->move($destinationPath, $getimage);
        
        $product = Product::where('id','=',$data['product_id'])->first();
        return redirect()->route('imageadmin.list',[$product['product_code'],$name]);
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
