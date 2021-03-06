<?php

namespace App\Providers;

use App\Models\Category;
use Cart;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('components.site-navigation', function ($view) {
            $view->with('cartCount', Cart::getContent()->count());
        });
    }
}
