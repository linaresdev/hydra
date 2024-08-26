<?php
namespace Hydra\Install\Provider;

/*
*---------------------------------------------------------
* ©IIPEC
* Santo Domingo República Dominicana.
*---------------------------------------------------------
*/

use Illuminate\Support\Facades\Http;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider {

    public function boot() 
    {
        $this->routes(function()
        {
            Route::middleware("web")
                ->namespace("Hydra\Install\Controllers")
                ->group(__DIR__.'/../routes.php');
        });
    }
}