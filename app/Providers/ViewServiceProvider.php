<?php

namespace App\Providers;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        if(!Cache::has('latest_posts')){
            $latest_posts=Post::select('id','title','slug')->latest()->limit(5)->get();
            Cache::remember('latest_posts',3600,function()use($latest_posts){
                return $latest_posts;
            });
        }
        
        if(!Cache::has('greatest_comments')){
            $greatest_comments=Post::withCount('comments')->orderBy('comments_count','desc')
      ->take(5)
      ->get();
            Cache::remember('greatest_comments',3600,function()use($greatest_comments){
                return $greatest_comments;
            });
        }
        $latest_posts=Cache::get('latest_posts');
        $greatest_comments=Cache::get('greatest_comments');
        view()->share([
            'latest_posts'=>$latest_posts,
            'greatest_comments'=>$greatest_comments,
        ]);
    }
}
