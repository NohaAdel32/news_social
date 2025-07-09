<?php

namespace App\Http\Controllers\frontend\dashboard;

use auth;
use Exception;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use App\Utils\ImageManager;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\postRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class profileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = auth()->user()->posts()->active()->with(['images'])->latest()->get();

        return view('frontend.dashboard.profile', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(postRequest $request)
    {
        try {
            DB::beginTransaction();
            $request->validated();
            $request->comment_able == "on" ? $request->merge(['comment_able' => 1]) : $request->merge(['comment_able' => 0]);
            $post = auth()->user()->posts()->create($request->except(['_token', 'images']));
            ImageManager::uploadImage($request, $post);
            DB::commit();
            Cache::forget('read_more_posts');
            cache::forget('latest_posts');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
        Session::flash('success', 'Your registration was successful.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
      $post = Post::with(['images'])->where('slug', $slug)->firstOrFail();
      if(!$post){
        abort(404);
      }
       
       return view('frontend.dashboard.editPost',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        return $request;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);

        ImageManager::deleteImages($post);


        $post->delete(); // حذف البوست نفسه

        Session::flash('success', 'Delete Data Success');
        return redirect()->back();
    }
    public function getComment($id)
    {
        $comments = Comment::with(['user'])->where('post_id', $id)->get();
    
        if ($comments->isEmpty()) {
            return response()->json([
                'data' => null,
                'msg' => 'No Comments'
            ]);
        }
        return response()->json([
            'data' => $comments,
            'msg' => "Contain Comments",
        ]);
    }
}
