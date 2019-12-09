<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use DB;

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
        view::share('urlTemplateAdmin',getenv('TEMPLATE_ADMIN'));
        view::share('urlTemplateBook',getenv('TEMPLATE_BOOK'));

        $category = DB::table('category')->get();
        view::share('boot_category', $category);
        
    }
}
