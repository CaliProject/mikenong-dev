<?php

namespace App\Providers;

use App\Product;
use App\User;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeSidebarLatest();
        $this->composeSidebarHottest();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Compose the sidebar view with a latest variable
     */
    protected function composeSidebarLatest()
    {
        view()->composer('products.partials.sidebar_latest', function ($view) {
            $view->with('latest_cooperatives', User::hottest()->take(8)->get());
        });
    }

    /**
     * Compose the sidebar view with a hottest products variable
     */
    protected function composeSidebarHottest()
    {
        view()->composer('products.partials.sidebar_hottest', function ($view) {
            $view->with('hottest_cooperatives', User::cooperatives()->take(5)->get());
        });
    }
}
