<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Brand;
use \Illuminate\Support\Facades\DB;

class ProductAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all()->unique('category_name');
        $products = Product::with('brand')
                            ->join('brands',function($join){
                                $join->on('products.brand_id', '=', 'brands.id');
                            })
                            ->join('categories',function($join){
                                $join->on('products.category_id', '=', 'categories.id');
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
        $parents = Category::where('parent_id','=', NULL)->get();
        return view('products.list',compact('products','parents','categories'));
    }

    public function select(Request $request)
    {
        $data = $request->all();
        $category = Category::where('category_name','=', $data['category_name'])
                            ->where('parent_id','=', $data['parent_id'])
                            ->first();  
        $id_category = $category['id'];             
        $products = Product::with('brand','category')
                            ->join('brands',function($join){
                                $join->on('products.brand_id', '=', 'brands.id');
                            })
                            ->join('categories',function($join){
                                $join->on('products.category_id', '=', 'categories.id');
                            })
                            ->where('category_id','=',$category['id'])->get();
        return view('products.select',compact('products','id_category'));
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $categories = Category::find($id);
        $brands = Brand::all();
        return view('products.create',compact('categories','brands'));
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
        Product::create($data);
        return redirect()->route('products.select');
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
    public function edit($code)
    {
        $products = Product::where('product_code','=',$code)->first();
        return view('products.edit', compact('products'));
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
        // $category = Category::where('category_name','=', $data['category_name'])
        //                     ->where('parent_id','=', $data['parent_id'])
        //                     ->first();
        // $data['category_id'] = $category['id'];
        Product::find($id)->update($data);
        return redirect()->route('products.select')->with('message', 'Update User Success !');//cau event hien thi sau khi update
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
