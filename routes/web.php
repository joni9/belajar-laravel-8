<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardCategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardDosenController;
use App\Http\Controllers\DashboardInfoController;
use App\Http\Controllers\DashboardPartnerController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardSliderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\postController;
use App\Http\Controllers\RegisterController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/',[HomeController::class, 'index']);
Route::get('/info/{info:slug}',[HomeController::class, 'show']);
Route::get('/profil/ti', function () {
    return view('profil.TI');
});
Route::get('/profil/himatek', function () {
    return view('profil.himatek');
});
Route::get('/profil/dosen',[HomeController::class, 'dosen']);
Route::get('/posts',[postController::class, 'index']);
Route::get('/posts/{post:slug}',[postController::class, 'show']);
Route::get('/category',[CategoryController::class, 'index'])->name('category');
Route::get('/kemahasiswaan', function () {
    return view('kemahasiswaan.index');
});
Route::get('/login',[LoginController::class, 'index'])->name('login')->middleware('guest');//mengecek tamu yang belum login
Route::post('/login',[LoginController::class, 'authenticate']);
Route::post('/logout',[LoginController::class, 'logout']);
Route::get('/register',[RegisterController::class, 'index'])->middleware('guest');//mengecek tamu yang belum bisa login dan yang mau daftar;
Route::post('/register',[RegisterController::class, 'newRegister']);
Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');//mengecek yang boleh masuk yang sudah login);
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
Route::get('/dashboard/categories/checkSlug', [DashboardCategoryController::class, 'checkSlug'])->middleware('Admin');
Route::resource('/dashboard/categories', DashboardCategoryController::class)->except('show')->middleware('Admin');
Route::resource('/dashboard/slidder', DashboardSliderController::class)->except('show')->middleware('auth');
Route::resource('/dashboard/partner', DashboardPartnerController::class)->except('show')->middleware('Admin');
Route::resource('/dashboard/dosen', DashboardDosenController::class)->except('show')->middleware('Admin');
Route::get('/dashboard/info/checkSlug', [DashboardInfoController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/info', DashboardInfoController::class)->middleware('auth');