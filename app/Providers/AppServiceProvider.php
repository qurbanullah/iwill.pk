<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // // Let laravel know the public path of your application
        if (env('APP_URL') == "https://iwill.pk"){
            $this->app->bind('path.public', function () {
                return base_path('../public_html');
            // Change httpdocs to public_html if you are using cpanel
            });
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
