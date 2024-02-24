<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        // preko provajdera mozemo nesto da posaljemo layout-u
        view()->composer('layouts.app', function ($view) {
            $view->with('currentLocale', App::currentLocale());
        });
    }
}
