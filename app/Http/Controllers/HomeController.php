<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Info;
use App\Models\Partner;
use App\Models\post;
use App\Models\slidder;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $slidders=slidder::all();
        $infos=Info::latest()->paginate(4);
        $Partners=Partner::all();
        $posts=post::latest()->paginate(4);
        return view('home',[
            'active' => 'home',
            'slidders' => $slidders,
            'infos' => $infos,
            'partners' => $Partners,
            'posts' => $posts
        ]);
    }
    public function dosen(){
        $dosens=Dosen::all();
        return view('profil.dosen',[
            'dosens' => $dosens
        ]);
    }
    public function show(Info $info){
        return view('infoDetail',[
            'info' => $info,
        ]);

    }
}
