<?php
namespace Hydra\User\Provider;

/*
*---------------------------------------------------------
* ©IIPEC
* Santo Domingo República Dominicana.
*---------------------------------------------------------
*/

use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider {

    public function boot() {}

    public function register()
    {
        $this->app['config']->set("auth.guards.hydra.driver", "session");
        $this->app['config']->set("auth.guards.hydra.provider", "users");

        $this->app['config']->set("auth.providers.hydra.driver", "eloquent");
        $this->app['config']->set("auth.providers.hydra.model", \Hydra\User\Model\Store::class);
    }
}