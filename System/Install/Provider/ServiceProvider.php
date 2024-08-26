<?php
namespace Hydra\Install\Provider;

/*
*---------------------------------------------------------
* ©IIPEC
* Santo Domingo República Dominicana.
*---------------------------------------------------------
*/

use Hydra\Core\Facade\Hydra;
use Illuminate\Support\ServiceProvider as Provider;

class ServiceProvider extends Provider
{

    public function boot() 
    { 
        ## VIEWS
        $this->loadViewsFrom(__DIR__.'/../Views', 'install');

        ## DATABASE
        $this->loadMigrationsFrom( __path("{migrations}") );
      
        /*
        * ADMIN PUBLISHER */   
        $this->publishes([
            __path("{system}/Assets")               => __path("{cdn}"),
            //__path("{system}/Moon/Http/Assets")     => __path("{themes}/moon")
        ], "hydra");

        /*
        * ALIAS */
    }

    public function register()
    {
        define("__INSTALL__", realpath(__DIR__."/.."));
    }
}