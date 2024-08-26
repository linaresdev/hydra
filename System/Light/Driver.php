<?php
namespace Hydra\Light;
/*
*---------------------------------------------------------
* ©HYDRA THEME
*---------------------------------------------------------
*/

class Driver
{

    public function info()
    {
        return [
            'name'          => 'Light',
            'author'        => 'Ramon A Linares Febles',
            'email'         => 'linareslf@gmail.com',
            'license'       => 'Mit',
            'support'       => 'https://support.lc',
            'version'       => 'V-0.0',
            'description'   => 'Hydra Light Theme'
        ];
    }

    public function app()
    {
        return [
            'type'      => 'theme',
            'slug'      => 'light',
            'driver'    => \Hydra\Light\Driver::class,
            'token'     => NULL,
            'activated' => 1
        ];
    }

    public function helper() { 
        return __DIR__."/Http/App.php";
    }

    public function install($app) {
        $app->create($this->app())->addMeta("info", $this->info());
    }

    public function destroy($app) { }

}