<?php

namespace App\Http\Controllers\frontend;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
      $posts=Post::Active()->with('images')->latest()->paginate(9);
      $greatest_views=Post::Active()->orderBy('num_of_views','desc')->limit(3)->get();
      $oldest_posts=Post::Active()->oldest()->take(3)->get();
      $greatest_comments=Post::Active()->withCount('comments')->orderBy('comments_count','desc')
      ->take(3)
      ->get();
      $categories=Category::all();
      $categories_with_posts=$categories->map(function($category){
        $category->posts=$category->posts()->limit(4)->get();
        return $category;
      });
      return view('frontend.index',compact('posts','greatest_views','oldest_posts','greatest_comments','categories_with_posts'));
    }
}
