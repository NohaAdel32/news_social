<?php

use App\Http\Controllers\frontend\CategoryController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\NewSubscribeController;
use App\Http\Controllers\frontend\PostController;
use App\Http\Controllers\frontend\SearchController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



// Route::get('/', function () {
//     return view('frontend.single');
// });
Route::get('/home', [HomeController::class, 'index'])->name('frontend.index')->middleware(['auth','verified']);
Route::group(['as'=>'frontend.'] , function(){
Route::post('Newsubscribe', [NewSubscribeController::class,'store'])->name('newsubscribe');
Route::get('category-posts/{slug}',CategoryController::class)->name('category_posts');

Route::controller(PostController::class)->prefix('posts/')->group(function(){
    Route::get('{slug}', 'show')->name('show.post');
    Route::get('comments/{slug}', 'getAllComments')->name('post.getAllComments');
    Route::post('comments/store', 'saveComment')->name('post.Comment.store');
});

Route::controller(ContactController::class)->name('contact.')->prefix('contact-us')->group(function(){
Route::get('/',[ContactController::class, 'index'])->name('index');
Route::post('/store',[ContactController::class, 'store'])->name('store');
});
Route::match(['get','post'],'search',SearchController::class)->name('search');
});
Auth::routes(['verify' => true]);


