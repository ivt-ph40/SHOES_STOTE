<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Brand;
use App\Validations\Validation;
use App\Http\Requests\BrandRequest;
use App\Product;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($name)
    {
        $brands = Brand::all();
        return view('brands.list',compact('brands','name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($name)
    {
        return view('brands.create',compact('name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request,$name)
    {
        // $validator = $this->validate($request, [
        //     'brand_name' => 'bail|required|string|min:3|max:10|unique:brands',
        // ]);
        // $validator = Validator::make($request->all(), [
        //     'brand_name' => 'bail|required|string|min:3|max:10|unique:brands',
        //     ]
        // );
        Validation::validateBrandRequest($request);
        $data = $request->all();
        Brand::create($data);
        return redirect()->route('brands.list',$name);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$name)
    {
        $brands = Brand::find($id);
        return view('brands.edit', compact('brands','name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, $id,$name)
    {
        Validation::validateBrandRequest($request);
        $data = $request->except('_token', '_method');
        Brand::find($id)->update($data);
        return Redirect() -> route('brands.list',$name)->with('message', 'Update User Success !');//cau event hien thi sau khi update
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$name)
    {
        $brands = Brand::find($id);
        $brands->delete();
        $brands->products()->delete();
        return Redirect() -> route('brands.list',$name)->with('message', 'Delete User Success !');
    }

    //Record
    public function showRecord($name){
        $brands = Brand::onlyTrashed()->get();
        return view('brands.record', compact('brands','name'));
    }

    public function restore($id,$name){
        Brand::withTrashed()->where('id','=',$id)->restore();
        Product::withTrashed()->where('brand_id','=',$id)->restore();
        return Redirect() -> route('brands.list',$name)->with('message', 'Delete User Success !');
    }

    public function force($id,$name){
        Brand::withTrashed()->where('id','=',$id)->forceDelete();
        return Redirect() -> route('brands.list',$name)->with('message', 'Delete User Success !');
    }
}
