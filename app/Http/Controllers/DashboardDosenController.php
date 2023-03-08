<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dosens=Dosen::all();
        return view('dashboard.dosen.index',[
            'dosens' => $dosens,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.dosen.create');
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
            'npm'              => 'required',
            'image_dosen'    => 'image|file|max:1024',
        ]);
        if($request->file('image_dosen')){
            $validateData['image_dosen'] = $request->file('image_dosen')->store('gambarDosen');//penyimpnan gambar
        } 
        Dosen::create($validateData);
        return redirect('/dashboard/dosen')->with('success', 'New dosen has been added!');
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
    public function edit(Dosen $dosen)
    {
        return view('dashboard.dosen.edit',[
            'dosen' => $dosen,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dosen $dosen)
    {
        $rules=[
            'name'         => 'required|min:5|max:255',
            'npm'         => 'required',
            'image_dosen'    => 'image|file|max:1024',
        ];
        $validateData=$request->validate($rules);
        //image harus dibawah validasi 
        if($request->file('image_dosen')){
            if($request->oldImage){//untuk menghapus dgambar lama
                Storage::delete($request->oldImage);
            }
            $validateData['image_dosen'] = $request->file('image_dosen')->store('gambarDosen');//penyimpnan gambar baru
        }
        //format untuk update
        Dosen::where('id', $dosen->id)
                ->update($validateData);
        return redirect('/dashboard/dosen')->with('success', 'dosen has been update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dosen $dosen)
    {
        if($dosen->image_dosen){//untuk menghapus gambar yang ada
            Storage::delete($dosen->image_dosen);
        }
        Dosen::destroy($dosen->id);
        return redirect('/dashboard/dosen')->with('successdelete', 'dosen '.$dosen->name.' has been delete!');
    
    }
}
