<?php

use App\Http\Controllers\ctrPost;
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
use App\Http\Controllers\ctrUsers;
use GuzzleHttp\Promise\Create;

Route::get('/', function () {
    return view('view_home');
})->name("home") ;

Route::get('/login',[ctrUsers::class,'index'])->name('view_users');
Route::get('/register',[ctrUsers::class,'create'])->name('view_register');
Route::post('/save_users',[ctrUsers::class,'store'])->name('stores');
Route::post('/connexion',[ctrUsers::class,'login'])->name('login');
Route::get('/users',[ctrUsers::class,'list'])->name('list');
Route::get("/edit/{user}",[ctrUsers::class,'edit'])->name('edit');
Route::get("/delete/{user}",[ctrUsers::class,'destroy'])->name('delete');
Route::post("/update/{user}",[ctrUsers::class,'update'])->name('update');
Route::get('/posts',[ctrPost::class,'index'])->name('view_posts');
Route::get('/post_register',[ctrPost::class,'create'])->name('view_post_register');
Route::post("/save_posts",[ctrPost::class,'store'])->name('store');
Route::get('/posts',[ctrPost::class,'list'])->name('view_posts');
Route::get('/edit_post/{post}',[ctrPost::class,'edit'])->name('edit_post');
Route::post("/updates/{post}",[ctrPost::class,'update'])->name('updates');
Route::get("/delete_post/{post}",[ctrPost::class,'destroy'])->name('delete_post');

