<?php

use Illuminate\Support\Facades\Route;

use  App\Http\Controllers\laptobController;
use  App\Http\Controllers\tvbController;
use  App\Http\Controllers\PostController;

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

Route::get('/',function(){
return view('posts.index');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::get('/profile/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
// Route Posts
Route::get('/post',[PostController::class, 'index'])->name('post.index');
Route::get('/post/trashed',[PostController::class, 'postTrashed'])->name('post.trashed');

Route::get('/post/create',[PostController::class, 'create'])->name('post.create');
Route::post('/post/store',[PostController::class, 'store'])->name('post.store');

Route::get('/post/edit/{id}',[PostController::class, 'edit'])->name('post.edit');
Route::get('/post/show/{slug}', [PostController::class, 'show'])->name('post.show');
Route::put('/post/update/{id}', [PostController::class, 'update'])->name('post.update');
Route::delete('/post/destroy{id}', [PostController::class, 'destroy'])->name('post.destroy');
Route::get('/post/hdelelet{id}', [PostController::class, 'hdelelet'])->name('post.hdelelet');
Route::get('/post/restore{id}', [PostController::class, 'restore'])->name('post.restore');
