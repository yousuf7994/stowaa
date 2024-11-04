<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories= Category::with(['childCategories'=>function($q){
            $q->with('products')->withCount('products');
        }])->withCount('products')->whereNull('parent_id')->orderBy('id', 'desc')->get();
        return view('backend.category.index', compact('categories'));
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
        $request->validate([
            'name'=>'required|unique:categories,name|max:100',
            'description'=>'nullable|max:400',
            'parent'=>'nullable|integer',
            'image'=> 'nullable|mimes:png,jpg,jpeg,webp',
        ]);
        $image_name = 'category.png';
        $data= new Category();
        
        if($request->file('image')){
            $image_name= Str::uuid().'.'. $request->image->extension();
            Image::make($request->image)->crop(200,256)->save('storage/category/'. $image_name,90);
        }
        
        $data->name = $request->name;
        $data->description = $request->description;
        $data->parent_id = $request->parent;
        $data->image = $image_name;
        $data->save();

        return back()->with('success',"Category Added Successfull!");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}