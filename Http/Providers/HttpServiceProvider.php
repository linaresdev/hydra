<?php
namespace Hydra\Http\Providers;

/*
*---------------------------------------------------------
* ©IIPEC
* Santo Domingo República Dominicana.
*---------------------------------------------------------
*/

use Hydra\Core\Facade\Hydra;
use Illuminate\Support\ServiceProvider;

class HttpServiceProvider extends ServiceProvider 
{
    public function boot() {
        require_once(__path("{http}/App.php"));
    }

    public function register() {
        hydra()->addPath([
            "{http}" => realpath(__DIR__."/../"),
        ]);
    }
}