<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\ServiceProvider;

class SettingProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
       
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
       $getsetting= Setting::firstOr(function(){
            return Setting::create([
       'site_name'=>'news',
       'email'=>'news@gmail.com',
       'favicon'=>'default',
       'logo'=>'default',
       'facebook'=>'https://www.facebook.com/',
       'twitter'=>'https://www.twitter.com/',
       'instagram'=>'https://www.instagram.com/',
       'youtube'=>'https://www.youtube.com/',
       'phone'=>'0122584566',
       'country'=>'Egypt',
       'city'=>'Cairo',
       'street'=>'Nasr City',
            ]);
       });
       view()->share([
        'getsetting'=>$getsetting,
    ]);
    }
}
