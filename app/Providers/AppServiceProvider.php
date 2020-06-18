<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; 
use App\page; 
use App\Setting; 

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $frontMenu = [
            '/' => 'Home'
        ];
        $pages = Page::all();
        foreach($pages as $page){
            $frontMenu[$page['slug']]  = $page['title'];
        };
        View::share('frontMenu',$frontMenu);

        $configurations = [];
        $settings = Setting::all();
        foreach($settings as $setting ){
            $configurations[$setting['name']] = $setting['content']; 
        }
        View::share('configurations',$configurations);
    }
}
