<?php
/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Hydra\Core\Facade\Hydra;

## CONFIGS
$this->loadConfig("app", __DIR__."/Config/app.php");
$this->loadConfig("guard", __DIR__."/Config/guard.php");

// ## IoC
$this->app->bind("Hydra", function( $app )
{
    return new \Hydra\Core\Support\Hydra(
        new \Hydra\Core\Support\BootLoader($app)
    );
});


$this->app["hydra"] = Hydra::app();

// ## LIBRERIAS
Hydra::app("load", new \Hydra\Core\Support\Loader($this->app));
Hydra::app("urls", new \Hydra\Core\Support\Urls($this->app));
Hydra::app("agent", new \Hydra\Core\Support\Guard($this->app));
Hydra::app("store", new \Hydra\Core\Support\Store($this->app["db"]));

// ## HELPERS
require_once(__DIR__."/Support/Helper.php");

// ## PATH
Hydra::addPath([
    "{base}"        => env("HYDRA_PUBLIC_DIR", "app"),
    "{public}"      => public_path()."/{base}",
    "{cdn}"         => "{public}/cdn",
    "{hydra}"       => realpath(__DIR__."/../../"),
    "{http}"        => "{hydra}/Http",
    "{system}"      => "{hydra}/System",
    "{migrations}"  => "{system}/Core/Database/Migrations",
    "{seeds}"       => "{system}/Core/Database/Seeds"
]);

// ## URLS
Hydra::addUrl([
    "{base}"    => env("HYDRA_PUBLIC_DIR", "app"),
    "{cdn}"    => "{base}/cdn",
]);

// /*
// * START APP*/
if( Hydra::start() ) {  
    Hydra::app("load")->run(new \Hydra\Core\Driver());
}
else {
   Hydra::app("load")->run(new \Hydra\Install\Driver());
}

