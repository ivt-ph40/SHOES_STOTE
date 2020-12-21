<?php

namespace App\Http\Controllers;
use App\Validations\Validation;

use App\Category;
use App\Brand;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($name)
    {
        $categories = Category::paginate(10);
        $parents = Category::where('parent_id','=', NULL)->get();
        return view('categories.list',compact('categories','name','parents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($name)
    {
        $parents = Category::where('parent_id','=', NULL)->get();
        return view('categories.create',compact('parents','name'));
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
        Category::create($data);
        return redirect()->route('categories.list',$name);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$name)
    {
        $categories = Category::find($id);
        return view('categories.edit', compact('categories','name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,$name)
    {
        Validation::validateCategorydRequest($request);
        $data = $request->except('_token', '_method');
        Category::find($id)->update($data);
        return Redirect() -> route('categories.list',$name)->with('message', 'Update User Success !');//cau event hien thi sau khi update
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$name)
    {
        $categories = Category::where('id','=',$id)->delete();
        return Redirect() -> route('categories.list',$name)->with('message', 'Delete User Success !');
    }

    public function showRecord($name){
        $categories = Category::onlyTrashed()->get();
        return view('categories.record', compact('categories','name'));
    }

    public function restore($id,$name){
        Category::withTrashed()->where('id','=',$id)->restore();
        $categories = Category::all();
        return Redirect() -> route('categories.list',$name)->with('message', 'Delete User Success !');
    }

    public function force($id,$name){
        Category::withTrashed()->where('id','=',$id)->forceDelete();
        $categories = Category::all();
        return Redirect() -> route('categories.list',$name)->with('message', 'Delete User Success !');
    }

    ///filter

    public function filter(Request $request, $name){
        $data = $request->except('_token', '_method');
        $categories = Category::where('parent_id','=',$data['parent_id'])->paginate(3);
        $parents = Category::where('parent_id','=', NULL)->get();
        return view('categories.list', compact('categories','name','parents'));
    }
}
