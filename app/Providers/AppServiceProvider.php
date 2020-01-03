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
        
        $about = DB::table('about')->select('name','address','work_time','phone','email','facebook')->first();
        view::share('boot_about', $about);

        $order = DB::table('order_form')->where('active',0)->count();
        view::share('boot_count_order', $order);

        $order_confirmed = DB::table('order_form')->where('active',1)->count();
        view::share('boot_count_order_confirmed', $order_confirmed);

        $order_success = DB::table('order_form')->where('active',2)->count();
        view::share('boot_count_order_success', $order_success);

        $order_cancel = DB::table('order_form')->where('active',-1)->count();
        view::share('boot_count_order_cancel', $order_cancel);
    }
}
