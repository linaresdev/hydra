<?php
namespace Hydra\Core;

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
            'name'          => 'Core',
            'author'        => 'Ramon A Linares Febles',
            'email'         => 'linareslf@gmail.com',
            'license'       => 'Mit',
            'support'       => 'https://support.lc',
            'version'       => 'V-0.0',
            'description'   => 'Hydra Core'
        ];
    }

    public function app()
    {
        return [
            'type'      => 'core',
            'slug'      => 'core',
            'driver'    => \Hydra\Core\Driver::class,
            'token'     => NULL,
            "activated" => false
        ];
    }

    public function drivers()
    {
        return [];
    }

    public function handler( $app ) {
        
    }

    public function providers() 
    {
        return [
            \Hydra\Core\Provider\HydraServiceProvider::Class,
        ]; 
    }
    
    public function alias() { return []; }

    public function install($app)
    { 
        $app->create($this->app())->addMeta("info", $this->info()); 
        
        ## Library
        (new \Hydra\Alert\Driver)->install($app);
        (new \Hydra\User\Driver)->install($app);

        ## Package
        (new \Hydra\Driver)->install($app);

        ## Theme
        (new \Hydra\Light\Driver)->install($app);
    }
    
    public function destroy($app)
    {
        ## Theme
        (new \Hydra\Light\Driver)->install($app);

        ## Library
        (new \Hydra\User\Driver)->destroy($app);
    }
}