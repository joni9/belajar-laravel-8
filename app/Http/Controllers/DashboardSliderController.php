<?php

namespace App\Http\Controllers;

use App\Models\slidder;
use Clockwork\Storage\Storage as StorageStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slidders=slidder::all();
        return view('dashboard.slidder.index',[
            'slidders' => $slidders,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.slidder.create');
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
            'image_slidder'    => 'image|file|max:1024',
        ]);
        if($request->file('image_slidder')){
            $validateData['image_slidder'] = $request->file('image_slidder')->store('gambarSlidder');//penyimpnan gambar
        } 
        slidder::create($validateData);
        return redirect('/dashboard/slidder')->with('success', 'New Slidder has been added!');
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
    public function edit(slidder $slidder)
    {
        return view('dashboard.slidder.edit',[
            'slidder' => $slidder,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, slidder $slidder)
    {
        $rules=[
            'image_slidder'    => 'image|file|max:1024',
        ];
        //image harus dibawah validasi 
        if($request->file('image_slidder')){
            if($request->oldImage){//untuk menghapus dgambar lama
                Storage::delete($request->oldImage);
            }
            $validateData['image_slidder'] = $request->file('image_slidder')->store('gambarSlidder');//penyimpnan gambar baru
        }
        //format untuk update
        slidder::where('id', $slidder->id)
                ->update($validateData);
        return redirect('/dashboard/slidder')->with('success', 'Slidder has been update!');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(slidder $slidder)
    {
        if($slidder->image_slidder){//untuk menghapus gambar yang ada
            Storage::delete($slidder->image_slidder);
        }
        slidder::destroy($slidder->id);
        return redirect('/dashboard/slidder')->with('successdelete', 'slidder '.$slidder->name.' has been delete!');
    }
}
