<?php

namespace skrpm\rapyd;

use Illuminate\Support\ServiceProvider;
use skrpm\rapyd\Library\Rapyd;
class RapydServiceProvider extends ServiceProvider
{
//    protected $defer = true;
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('rpm', function($app){
            return new Rapyd(config('rapyd.rapyd'));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__."/routes.php");

        $this->publishes([
            __DIR__.'/Config/rapyd.php' => config_path('rapyd.php'),
        ]);
    }
}
