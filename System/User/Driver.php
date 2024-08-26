<?php
namespace Hydra\User;

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
            'name'          => 'User',
            'author'        => 'Ramon A Linares Febles',
            'email'         => 'linareslf@gmail.com',
            'license'       => 'Mit',
            'support'       => 'https://support.lc',
            'version'       => 'V-0.0',
            'description'   => 'Users Libraries'
        ];
    }

    public function app()
    {
        return [
            'type'      => 'library',
            'slug'      => 'user',
            'driver'    => \Hydra\User\Driver::class,
            'token'     => NULL,
            'activated' => 1
        ];
    }

    public function handler($app) {
        ## PRPVIDER
        // $app["config"]->set(
        //     "auth.providers.users.model", \Hydra\User\Model\Store::class
        // );        
    }

    public function providers() 
    { 
        return [
            \Hydra\User\Provider\UserServiceProvider::class
        ]; 
    }
    public function alias() { return []; }

    public function install($app) {

        ## Registro
        $app->create($this->app())->addMeta("info", $this->info());

        ## Database
        $path = str_replace(base_path(), null, __DIR__."/Database");

        \Artisan::call("migrate", [
            "--path" => $path."/Migrations"
        ]);

        ## Seeds
        \Artisan::call("db:seed", [
            "--class" => \Hydra\User\Database\Seeds\UserSeed::class
        ]);
    }

    public function destroy($app)
    {
        ## UNINSTALL SCHEMAS
        $path = str_replace(base_path(), null, __DIR__."/Database");
       
        \Artisan::call("migrate:reset", [
            "--path" => $path."/Migrations"
        ]);
    }

}