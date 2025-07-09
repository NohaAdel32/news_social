<?php

use App\Http\Controllers\frontend\dashboard\settingController;
use App\Http\Controllers\frontend\CategoryController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\dashboard\profileController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\NewSubscribeController;
use App\Http\Controllers\frontend\PostController;
use App\Http\Controllers\frontend\SearchController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;





// Route::get('/', function () {
//     return view('frontend.single');
// });
Route::get('/home', [HomeController::class, 'index'])->name('frontend.index');

Route::group(['as' => 'frontend.'], function () {
    Route::post('Newsubscribe', [NewSubscribeController::class, 'store'])->name('newsubscribe');
    Route::get('category-posts/{slug}', CategoryController::class)->name('category_posts');

    Route::controller(PostController::class)->prefix('posts/')->group(function () {
        Route::get('{slug}', 'show')->name('show.post');
        Route::get('comments/{slug}', 'getAllComments')->name('post.getAllComments');
        Route::post('comments/store', 'saveComment')->name('post.Comment.store');
    });

    Route::controller(ContactController::class)->name('contact.')->prefix('contact-us')->group(function () {
        Route::get('/', [ContactController::class, 'index'])->name('index');
        Route::post('/store', [ContactController::class, 'store'])->name('store');
    });
    Route::match(['get', 'post'], 'search', SearchController::class)->name('search');

    Route::prefix('account/')->name('dashboard.')->middleware(['auth:web', 'verified'])->group(function () {
        Route::controller(profileController::class)->group(function () {
            Route::get('profile', 'index')->name('showProfile');
            Route::post('post/store', 'store')->name('storePost');
            Route::get('post/edit/{slug}', 'edit')->name('editPost');
             Route::put('post/update/{slug}', 'update')->name('updatePost');
            Route::get('post/delete/{id}', 'destroy')->name('deletePost');
            Route::get('post/getComments/{id}', 'getComment')->name('post.getComments');
        });
        Route::prefix('setting')->controller(settingController::class)->group(function () {
            Route::get('/', 'index')->name('showSetting');
            Route::post('/update', 'update')->name('updateSetting');
            Route::post('/change-password', 'changePassword')->name('setting.change-password');
        });
    });
});
Auth::routes(['verify' => true]);
Route::get('test', function () {
    return view('frontend.dashboard.editPost');
});
