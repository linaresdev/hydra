<?php
namespace Hydra\Alert\Provider;

/*
*---------------------------------------------------------
* © Provider Alert
*---------------------------------------------------------
*/

use Hydra\Alert\Facade\Alert;
use Illuminate\Support\ServiceProvider;

class AlertServiceProvider extends ServiceProvider
{
    public function boot()
    {
        require_once(__DIR__."/../App.php");        
    }

    public function register()
    {
        $this->app->bind("Alert", function($app)
        {
            return new \Hydra\Alert\Support\Alert();
        });
    }
}