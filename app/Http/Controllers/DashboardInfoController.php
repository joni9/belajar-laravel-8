<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DashboardInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infos=Info::all();
        return view('dashboard.info.index',[
            'infos' => $infos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.info.create');
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
            'slug'          => 'required|unique:infos',
            'image_info'    => 'image|file|max:1024',
            'description'   => 'required',
        ]);
        if($request->file('image_info')){
            $validateData['image_info'] = $request->file('image_info')->store('gambarInfo');//penyimpnan gambar
        }
        $validateData['short'] = Str::limit(strip_tags($request->description), 100);//mengambil dari inputan description, stip tag agar tidak ada tag htmlnya
        Info::create($validateData);
        return redirect('/dashboard/info')->with('success', 'New info has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Info $info)
    {
        return view('dashboard.info.show', [
            'info' => $info,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Info $info)
    {
        return view('dashboard.info.edit',[
            'info'       => $info,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Info $info)
    {
        $rules=[
            'title'         => 'required|min:5|max:255',
            'image_info'    => 'image|file|max:1024',
            'description'   => 'required',
        ];
        //validasi agar slug jika ganti tidak error dan jika tidak ganti juga tidak error
        if($request->slug != $info->slug){
            $rules['slug']  = 'required|unique:infos';
        }
        $validateData=$request->validate($rules);
        //image harus dibawah validasi 
        if($request->file('image_info')){
            if($request->oldImage){//untuk menghapus dgambar lama
                Storage::delete($request->oldImage);
            }
            $validateData['image_info'] = $request->file('image_info')->store('gambarInfo');//penyimpnan gambar baru
        }
        $validateData['short'] = Str::limit(strip_tags($request->description), 100);//mengambil dari inputan description, stip tag agar tidak ada tag htmlnya
        //format untuk update
        Info::where('id', $info->id)
            ->update($validateData);
        return redirect('/dashboard/info')->with('success', 'info '.$info->title.' has been update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Info $info)
    {
        if($info->image_info){//untuk menghapus gambar yang ada
            Storage::delete($info->image_info);
        }
        Info::destroy($info->id);
        return redirect('/dashboard/info')->with('successdelete', 'info '.$info->title.' has been delete!');
    }
    //input slug otomatis
    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Info::class, 'slug', $request->title);
       return response()->json(['slug' => $slug]);
       }
}
