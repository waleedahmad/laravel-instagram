<?php

namespace App\Providers;

use App\Classes\InstagramAPI;
use Illuminate\Support\ServiceProvider;

class InstagramSerivceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('InstagramAPI', function(){
            return new InstagramAPI();
        });
    }
}
