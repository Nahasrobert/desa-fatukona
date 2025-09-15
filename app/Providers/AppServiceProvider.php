<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrapFive();
        View::composer('*', function ($view) {
            $settings = Setting::getAll();
            $view->with('settings', $settings);
        });
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        //
    }
}
