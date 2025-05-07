<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'search'=>['nullable','string','max:100'],
        ]);
        $keyword=strip_tags($request->search);// to secure
        $posts=Post::Active()->where('title','LIKE','%'.$keyword.'%')->
        orWhere('desc','LIKE','%'.$keyword.'%')->paginate(14);
        
        return view('frontend.search',compact('posts'));
    }
}
