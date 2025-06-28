<?php

namespace App\Providers;
use App\Models\Category;
use App\Models\Post;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class CacheServiceProvider extends ServiceProvider
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
        
        //read more
        if(!Cache::has('read_more_posts')){
            $read_more_posts=Post::select('id','title','slug')->latest()->limit(10)->get();
            Cache::remember('read_more_posts',3600,function()use($read_more_posts){
                return $read_more_posts;
            });
        }
//latest
           if(!Cache::has('latest_posts')){
            $latest_posts=Post::select('id','title','slug')->latest()->limit(5)->get();
            Cache::remember('latest_posts',3600,function()use($latest_posts){
                return $latest_posts;
            });
        }
        //greatest
        if(!Cache::has('greatest_comments')){
            $greatest_comments=Post::withCount('comments')->orderBy('comments_count','desc')
      ->take(5)
      ->get();
            Cache::remember('greatest_comments',3600,function()use($greatest_comments){
                return $greatest_comments;
            });
        }

        $read_more_posts=Cache::get('read_more_posts');
        $latest_posts=Cache::get('latest_posts');
        $greatest_comments=Cache::get('greatest_comments');
       
        view()->share([
            'read_more_posts'=>$read_more_posts,
              'latest_posts'=>$latest_posts,
            'greatest_comments'=>$greatest_comments,

        ]);
    }
}
