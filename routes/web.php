<?php

use App\Http\Controllers\frontend\NewSubscribeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\HomeController;

// Route::get('/', function () {
//     return view('frontend.single');
// });
Route::get('/', [HomeController::class, 'index'])->name('frontend.index');
Route::group(['as'=>'frontend.'] , function(){
    Route::post('Newsubscribe', [NewSubscribeController::class,'store'])->name('newsubscribe');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
