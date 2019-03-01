<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\AppHelper;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */



    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */

    public function boot()
    {

        $this->app->bind('AppHelper', function ($app) {
            return new AppHelper();
        });

    }
}
