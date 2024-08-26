<?php
namespace Hydra\Install;
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
            'name'          => 'Install',
            'author'        => 'Ramon A Linares Febles',
            'email'         => 'linareslf@gmail.com',
            'license'       => 'Mit',
            'support'       => 'https://support.lc',
            'version'       => 'V-0.0',
            'description'   => 'Modulo instalador'
        ];
    }

    public function app()
    {
        return [
            'type'      => 'package',
            'slug'      => 'install',
            'driver'    => \Hydra\Install\Driver::class,
            'token'     => NULL,
            'activated' => 1
        ];
    }

    // public function handler( $app ) {}

    public function providers() { 
        return [
            \Hydra\Install\Provider\ServiceProvider::class,
            \Hydra\Install\Provider\RouteServiceProvider::class
        ]; 
    }
    public function alias() { return []; }

    // public function install($app) { }
    // public function destroy($app) { }
}