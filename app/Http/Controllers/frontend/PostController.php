<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function show($slug)
    {
        $mainpost = Post::Active()->with(['comments'=>function($query){
            $query->latest()->limit(3);
        }])->whereSlug($slug)->first();
        $post_in_category = Post::Active()->where("category_id", $mainpost->category_id)
            ->limit(5)->get();
        return view("frontend.single", compact("mainpost","post_in_category"));
    }
    
    public function getAllComments($slug){
        $post=Post::whereSlug($slug)->first();
        $comments=$post->comments()->with('user')->get();
        return response()->json($comments);
    
    }
    public function saveComment(Request $request ) {
            $request->validate([
                'comment'=>['required','string','max:200'],
                'user_id'=>['required','exists:users,id'],
                'post_id'=>['required','exists:posts,id'],
            ]);
            $comment=Comment::create([
                 'user_id'=>$request->user_id,
                 'comment'=>$request->comment,
                 'post_id'=>$request->post_id,
                 'ip_adress'=>$request->ip(),
            ]);
            $comment->load('user');
            if(!$comment){
                return response()->json([
                    'data'=>'operation failed',
                    'status'=>'403',
                ]);
            }
            return response()->json([
                'msg'=>'comment store successful',
                'comment'=>$comment,
                'status'=>'201',
            ]); 
    }
   
}
