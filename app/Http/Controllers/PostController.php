<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function home(){
        return view('home',['active' => 'home']);
    }
    public function index(){
        $judul = '';
        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $judul = 'in '.$category->name;
        }
        if(request('User')){
            $User = User::firstWhere('name', request('User'));
            $judul = 'by '.$User->name;
        }
        $posts=post::latest()->filter(request(['search' , 'category','User']))->paginate(7)->withQueryString();
        return view('blog',[
            'title' => 'Semua posts '.$judul,
            'posts' => $posts,
        ]);
    }
    public function show(post $post){
        return view('postdetail',[
            'post' => $post,
        ]);

    }

}
