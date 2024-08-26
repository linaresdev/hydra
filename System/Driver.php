<?php
namespace Hydra;
/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

class Driver 
{
    public function info()
    {
        return [
            'name'          => 'Hydra',
            'author'        => 'Ramon A Linares Febles',
            'email'         => 'linareslf@gmail.com',
            'license'       => 'Mit',
            'support'       => 'https://support.lc',
            'version'       => 'V-0.0',
            'description'   => 'Hydra Manager'
        ];
    }

    public function app()
    {
        return [
            'type'      => 'package',
            'slug'      => 'hydra',
            'driver'    => \Hydra\Driver::class,
            'token'     => NULL,
            'activated' => 1
        ];
    }
  
    public function providers()
    { 
        return [
            \Hydra\Providers\HydraHttpServiceProvider::Class,
            \Hydra\Providers\HydraRouteServiceProvider::Class,
        ]; 
    }

    public function alias() { return []; }

    public function install($app) {
        $app->create($this->app())->addMeta("info", $this->info());
    }

    public function destroy($app) { }

}