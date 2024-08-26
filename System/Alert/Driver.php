<?php
namespace Hydra\Alert;
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
            'name'          => 'Alert',
            'author'        => 'Ramon A Linares Febles',
            'email'         => 'linareslf@gmail.com',
            'license'       => 'Mit',
            'support'       => 'https://support.lc',
            'version'       => 'V-0.0',
            'description'   => 'Alerts Libraries'
        ];
    }

    public function app()
    {
        return [
            'type'      => 'library',
            'slug'      => 'alert',
            'driver'    => \Hydra\Alert\Driver::class,
            'token'     => NULL,
            'activated' => 1
        ];
    }

    public function providers()
    { 
        return [
            \Hydra\Alert\Provider\AlertServiceProvider::class,
        ];
    }
    public function alias()
    { 
        return [
            "Alert" => \Hydra\Alert\Facade\Alert::class,
        ]; 
    }

    public function install($app)
    {
        ## Registro
        $app->create($this->app())->addMeta("info", $this->info());
    }

    public function destroy($app) {}

}