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
        //
       /* $this->app->bind('path.public',function(){
            return'/home/yx5pouwmhdj4/restauracionnacional.org.pe';
            //return'/home/yx5pouwmhdj4/victorianacional.org.pe';
        });*/
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
