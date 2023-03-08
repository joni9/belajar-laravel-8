<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class DashboardCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::latest()->paginate(10);
        return view('dashboard.categories.index',[
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData=$request->validate([
            'name'              => 'required|min:5|max:255',
            'slug'              => 'required|unique:categories',
            'image_category'    => 'image|file|max:1024',
        ]);
        if($request->file('image_category')){
            $validateData['image_category'] = $request->file('image_category')->store('gambarCategory');//penyimpnan gambar
        } 
        Category::create($validateData);
        return redirect('/dashboard/categories')->with('success', 'New Category has been added!');
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
        return view('dashboard.categories.edit',[
            'category'       => $category,
        ]);
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
        $rules=[
            'name'         => 'required|min:5|max:255',
            'image_category'    => 'image|file|max:1024',
        ];
        //validasi agar slug jika ganti tidak error dan jika tidak ganti juga tidak error
        if($request->slug != $category->slug){
            $rules['slug']  = 'required|unique:categories';
        }
        $validateData=$request->validate($rules);
        //image harus dibawah validasi 
        if($request->file('image_category')){
            if($request->oldImage){//untuk menghapus dgambar lama
                Storage::delete($request->oldImage);
            }
            $validateData['image_category'] = $request->file('image_category')->store('gambarCategory');//penyimpnan gambar baru
        }
        //format untuk update
        Category::where('id', $category->id)
                ->update($validateData);
        return redirect('/dashboard/categories')->with('success', 'Category '.$category->name.' has been update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category->image_category){//untuk menghapus gambar yang ada
            Storage::delete($category->image_category);
        }
        Category::destroy($category->id);
        return redirect('/dashboard/categories')->with('successdelete', 'category '.$category->name.' has been delete!');
    }
    
    //input slug otomatis
    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Category::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
   
}
