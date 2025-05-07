<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke( $slug)
    {
       $category=Category::whereSlug($slug)->first();
       $posts=$category->posts()->Active()->paginate(9);
       return view("frontend.category_posts",compact("category","posts"));
    }
}
