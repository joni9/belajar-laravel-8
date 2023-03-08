<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardPartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners=Partner::all();
        return view('dashboard.partner.index',[
            'partners' => $partners,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.partner.create');
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
            'image_partner'    => 'image|file|max:1024',
        ]);
        if($request->file('image_partner')){
            $validateData['image_partner'] = $request->file('image_partner')->store('gambarPartner');//penyimpnan gambar
        } 
        Partner::create($validateData);
        return redirect('/dashboard/partner')->with('success', 'New Partner has been added!');
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
    public function edit(Partner $partner)
    {
        return view('dashboard.partner.edit',[
            'partner' => $partner,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {
        $rules=[
            'name'         => 'required|min:5|max:255',
            'image_partner'    => 'image|file|max:1024',
        ];
        $validateData=$request->validate($rules);
        //image harus dibawah validasi 
        if($request->file('image_partner')){
            if($request->oldImage){//untuk menghapus dgambar lama
                Storage::delete($request->oldImage);
            }
            $validateData['image_partner'] = $request->file('image_partner')->store('gambarPartner');//penyimpnan gambar baru
        }
        //format untuk update
        partner::where('id', $partner->id)
                ->update($validateData);
        return redirect('/dashboard/partner')->with('success', 'partner has been update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        if($partner->image_partner){//untuk menghapus gambar yang ada
            Storage::delete($partner->image_partner);
        }
        partner::destroy($partner->id);
        return redirect('/dashboard/partner')->with('successdelete', 'partner '.$partner->name.' has been delete!');
    
    }
}
