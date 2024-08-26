<?php
namespace Hydra\Core\Provider;

/*
*---------------------------------------------------------
* ©IIPEC
* Santo Domingo República Dominicana.
*---------------------------------------------------------
*/

use Hydra\Core\Facade\Hydra;
use Illuminate\Support\ServiceProvider;

class HydraServiceProvider extends ServiceProvider
{
    public function boot() { 
        /*
        * VIEWS */
        //$this->loadViewsFrom(__DIR__.'/../../Exception/Views', 'excep');                
    }

    public function register()
    {
        /*
        *  INIT
        *  Niveles de ejecución del registro
        * ----------------------------------------------------------------------------------------------------------------------
        * [0] => CORE | [1] => LIBRARIES | [2] => PACKAGES | [3] => PLUGINS | [4] => THEMES | [5] => COMPONENTS | [6] => WIDGETS
        * ----------------------------------------------------------------------------------------------------------------------
        */

        /*
        * [1] => LIBRARIES */
        Hydra::initialize("library");

        /*
        * [1] => PACKAGES */
        Hydra::initialize("package");

        /*
        * [1] => PLUGINS */
        Hydra::initialize("plugin");

        /*
        * [4] => THEMES */
        Hydra::initialize("theme");

        /*
        * [5] => COMPONENTS */
        Hydra::initialize("component");

        /*
        * [6] => WIDGETS */
        Hydra::initialize("widget");
    }
}