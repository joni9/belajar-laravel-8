<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::get();
        return view('category',[
            'active' => 'category',//untuk mengkatifkan warna saat diklik dettingan di navbar app defaul
            'categories' => $categories,
        ]);
    }
    public function show(Category $category){
        return view('categories',[
            'active' => 'category',////untuk mengkatifkan warna saat diklik dettingan di navbar app defaul
            'posts' => $category->post,
            'category'=>$category,
        ]);
    }
}
