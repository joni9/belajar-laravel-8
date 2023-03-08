<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\post;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=post::where('id_user', auth()->user()->id)->with(['Category'])->latest()->paginate(10);
        return view('dashboard.posts.index',[
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create',[
            'categories' => Category::all(),
        ]);
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
            'title'         => 'required|min:5|max:255',
            'slug'          => 'required|unique:posts',
            'image_post'    => 'image|file|max:1024',
            'id_category'   => 'required',
            'description'   => 'required',
        ]);
        if($request->file('image_post')){
            $validateData['image_post'] = $request->file('image_post')->store('gambarPost');//penyimpnan gambar
        }
        $validateData['id_user'] = auth()->user()->id;
        $validateData['short'] = Str::limit(strip_tags($request->description), 100);//mengambil dari inputan description, stip tag agar tidak ada tag htmlnya
        post::create($validateData);
        return redirect('/dashboard/posts')->with('success', 'New post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        return view('dashboard.posts.show', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        return view('dashboard.posts.edit',[
            'post'       => $post,
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        $rules=[
            'title'         => 'required|min:5|max:255',
            'id_category'   => 'required',
            'image_post'    => 'image|file|max:1024',
            'description'   => 'required',
        ];
        //validasi agar slug jika ganti tidak error dan jika tidak ganti juga tidak error
        if($request->slug != $post->slug){
            $rules['slug']  = 'required|unique:posts';
        }
        $validateData=$request->validate($rules);
        //image harus dibawah validasi 
        if($request->file('image_post')){
            if($request->oldImage){//untuk menghapus dgambar lama
                Storage::delete($request->oldImage);
            }
            $validateData['image_post'] = $request->file('image_post')->store('gambarPost');//penyimpnan gambar baru
        }
        $validateData['id_user'] = auth()->user()->id;
        $validateData['short'] = Str::limit(strip_tags($request->description), 100);//mengambil dari inputan description, stip tag agar tidak ada tag htmlnya
        //format untuk update
        post::where('id', $post->id)
            ->update($validateData);
        return redirect('/dashboard/posts')->with('success', 'post '.$post->title.' has been update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        if($post->image_post){//untuk menghapus gambar yang ada
            Storage::delete($post->image_post);
        }
        post::destroy($post->id);
        return redirect('/dashboard/posts')->with('successdelete', 'post '.$post->title.' has been delete!');
    }
    //input slug otomatis
    public function checkSlug(Request $request){
     $slug = SlugService::createSlug(post::class, 'slug', $request->title);
    return response()->json(['slug' => $slug]);
    }
}
