<?php

namespace App\Providers;
use App\Models\Category;
use App\Models\Post;
use App\Models\RelatedNewSite;
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
      //related new sites
        $related=RelatedNewSite::select('name','url')->get();
        $categories=Category::select('id','name','slug')->get();
        
        view()->share([
         
             'related'=>$related,
            'categories'=>$categories,
        ]);
    }
}
