<?php

namespace App\Providers;
use App\Models\Category;
use App\Models\Post;
use App\Models\RelatedNewSite;
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
        if(!Cache::has('read_more_posts')){
            $read_more_posts=Post::select('id','title')->latest()->limit(4)->get();
            Cache::remember('read_more_posts',3600,function()use($read_more_posts){
                return $read_more_posts;
            });
        }
        $read_more_posts=Cache::get('read_more_posts');

        //related new sites
        $related=RelatedNewSite::select('name','url')->get();
        $categories=Category::select('id','name','slug')->get();
        view()->share([
            'read_more_posts'=>$read_more_posts,
            'related'=>$related,
            'categories'=>$categories,

        ]);
    }
}
