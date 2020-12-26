<?php

namespace App\Http\Controllers;
use App\Validations\Validation;
use Illuminate\Validation\Rule;
use App\Http\Requests\ProductRequest;

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
    public function index($name)
    {
        $categories = Category::all()->unique('category_name');
        $parents = Category::where('parent_id','=', NULL)->get();
        $products = Product::with('brand')
                            ->join('brands',function($join){
                                $join->on('products.brand_id', '=', 'brands.id');
                            })
                            ->join('categories',function($join){
                                $join->on('products.category_id', '=', 'categories.id');
                            })
                            ->orderBy('products.id', 'ASC')
                            ->get();
        
        $brands = Brand::all();
        return view('products.list',compact('products','parents','categories','name','brands'));
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
    public function create($name)
    {
        
        $categories = Category::all()->unique('category_name');// lấy tên loại sản phẩm
        $parents = Category::where('parent_id','=', NULL)->get();// lấy men và women để select
        $brands = Brand::all(); // Lấy hãng giày
        return view('products.create',compact('categories','parents','brands','name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request,$name)
    {
        Validation::validateProductRequest($request);
        $data = $request->all();
        $category = Category::where('category_name','=', $data['category_name'])
                            ->where('parent_id','=', $data['parent_id'])
                            ->first();
                            //dd($category['id']);
        $data['category_id'] = $category['id'];
        Product::create($data);
        return redirect()->route('products.list',$name);
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
    public function edit($code,$name)
    {
        $products = Product::where('product_code','=',$code)->first();
        return view('products.edit', compact('products','name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,$name)
    {
        $data = $request->except('_token', '_method');
        // $category = Category::where('category_name','=', $data['category_name'])
        //                     ->where('parent_id','=', $data['parent_id'])
        //                     ->first();
        // $data['category_id'] = $category['id'];
        Product::find($id)->update($data);
        return redirect()->route('products.select',$name)->with('message', 'Update User Success !');//cau event hien thi sau khi update
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($code,$name)
    {
        $products = Product::where('product_code','=',$code)->first();
        $products->delete();
        return Redirect() -> route('products.list',$name)->with('message', 'Delete User Success !');
    }

    //Record
    public function showRecord($name){
        $products = Product::with('brand')
                            ->join('brands',function($join){
                                $join->on('products.brand_id', '=', 'brands.id');
                            })
                            ->join('categories',function($join){
                                $join->on('products.category_id', '=', 'categories.id');
                            })
                            ->onlyTrashed()
                            ->orderBy('products.id', 'ASC')
                            ->get();
        return view('products.record', compact('products','name'));
    }

    public function restore($code,$name){
        Product::withTrashed()->where('product_code','=',$code)->restore();
        return Redirect() -> route('products.list',$name)->with('message', 'Delete User Success !');
    }

    public function force($code,$name){
        Product::withTrashed()->where('product_code','=',$code)->forceDelete();
        return Redirect() -> route('products.list',$name)->with('message', 'Delete User Success !');
    }

    // SEARCH
    public function search(Request $request,$name){
        $search = $request->input('search');
        $search1 = $request->input('search1');
        $search2 = $request->input('search2');
        $search3 = $request->input('search3');
        //now get all user and services in one go without looping using eager loading
        //In your foreach() loop, if you have 1000 users you will make 1000 queries
        $products = Product::where(function($query) use ($search,$search1,$search2,$search3) {
            if($search == NULL){
                if($search1 == NULL){
                    if($search2 == NULL){
                        $category = Category::where('category_name','=',$search3)->pluck('id');
                        $query->whereIn('category_id',$category);
                    } 
                    else { 
                        $category = Category::where('parent_id','=',$search2)->pluck('id');
                        //dd($category);
                        $query->whereIn('category_id',$category);
                    }
                } 
                else {
                    $query->where('brand_id', '=' , $search1); 
                }
                
            } else {
                $query->where('product_name', 'LIKE', '%' . $search . '%')
                    ->orWhere('product_code', 'LIKE', '%' . $search . '%');
            }
            })
            ->with('brand','category')
            ->join('brands',function($join){
                $join->on('products.brand_id', '=', 'brands.id');
            })
            ->join('categories',function($join){
                $join->on('products.category_id', '=', 'categories.id');
            })
            ->get();
        $brands = Brand::all();
        $categories = Category::all()->unique('category_name');
        $parents = Category::where('parent_id','=', NULL)->get();
        return view('products.list', compact('products','parents','categories','name','brands'));
       
    }
    // SORT
    public function sort(Request $request,$name){
        $sort = $request->input('sort');
        $products1 = Product::with('brand','category')
        ->join('brands',function($join){
            $join->on('products.brand_id', '=', 'brands.id');
        })
        ->join('categories',function($join){
        $join->on('products.category_id', '=', 'categories.id');
        })->get();
        
        if($sort == 'price-up'){
            $products = $products1->sortBy('price');
            $products->values()->all();
        } 
        else {
            $products = $products1->sortByDesc('price');
            $products->values()->all();
        }
        $brands = Brand::all();
        $categories = Category::all()->unique('category_name');
        $parents = Category::where('parent_id','=', NULL)->get();
        return view('products.list', compact('products','parents','categories','name','brands'));
    }
    
}
