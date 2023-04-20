<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->composer(['master','menu'], 'App\Http\ViewComposers\SettingComposer');
        view()->composer('master', 'App\Http\ViewComposers\FooterComposer');
        view()->composer('master', 'App\Http\ViewComposers\TopMenuComposer');
        view()->composer('front.sidebar', 'App\Http\ViewComposers\SidebarComposer');
        view()->composer('menu', 'App\Http\ViewComposers\MenuComposer');
        view()->composer(['menu','front.templates.price','front.templates.download'], 'App\Http\ViewComposers\ProductsMenuComposer');
        view()->composer('front.templates.gallery', 'App\Http\ViewComposers\GalleryComposer');
        view()->composer('front.news.news', 'App\Http\ViewComposers\NewsComposer');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
