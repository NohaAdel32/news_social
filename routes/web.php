<?php

use App\Http\Controllers\frontend\CategoryController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\NewSubscribeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('frontend.single');
// });
Route::get('/', [HomeController::class, 'index'])->name('frontend.index');
Route::group(['as'=>'frontend.'] , function(){
Route::post('Newsubscribe', [NewSubscribeController::class,'store'])->name('newsubscribe');
Route::get('category-posts/{slug}',CategoryController::class)->name('category_posts');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
