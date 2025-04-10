<?php

use App\Http\Controllers\frontend\CategoryController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\NewSubscribeController;
use App\Http\Controllers\frontend\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



// Route::get('/', function () {
//     return view('frontend.single');
// });
Route::get('/', [HomeController::class, 'index'])->name('frontend.index');
Route::group(['as'=>'frontend.'] , function(){
Route::post('Newsubscribe', [NewSubscribeController::class,'store'])->name('newsubscribe');
Route::get('category-posts/{slug}',CategoryController::class)->name('category_posts');
Route::get('show-posts/{slug}',[PostController::class, 'show'])->name('show.post');
Route::get('show-posts/comments/{slug}',[PostController::class, 'getAllComments'])->name('post.getAllComments');
Route::post('show-posts/comments/store',[PostController::class, 'saveComment'])->name('post.Comment.store');

});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
