<?php
namespace Hydra\Core\Provider;

/*
*---------------------------------------------------------
* ©IIPEC
* Santo Domingo República Dominicana.
*---------------------------------------------------------
*/

use Hydra\Core\Facade\Hydra;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Translation\Translator;
use Illuminate\Support\ServiceProvider;

class CoreServiceProvider extends ServiceProvider 
{
    protected $PATH;

    protected $kernel;

    protected $lang;

    public function boot( Kernel $kernel, Translator $lang )
    {
        $this->kernel   = $kernel;
        $this->lang     = $lang;           
    }

    public function register() 
    {
        $this->PATH = realpath(__DIR__."/../../");

        require_once(__DIR__."/../Common.php");
        
    }

    public function loadConfig( $alia=null, $path=null )
    {
        if( $this->app["files"]->exists($path) )
        {
            $configs = $this->app["files"]->requireOnce($path);
            
            foreach( $configs as $key => $value )
            {
                $this->app["config"]->set("$alia.$key", $value);
            }
        }
    }    
}