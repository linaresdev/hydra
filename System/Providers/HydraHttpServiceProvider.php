<?php
namespace Hydra\Providers;

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

class HydraHttpServiceProvider extends ServiceProvider 
{
    protected $hydra;

    protected $http;

    protected $lang;

    protected $file;

    public function boot( Kernel $HTTP, Translator $LANG ) 
    {
        $this->http = $HTTP;
        $this->lang = $LANG;
        $this->file = $this->app["files"];

        require_once(__path("{hydra}/Http/App.php"));
    }

    public function register()
    {
        $this->hydra = $this->app["hydra"];
        // hydra()->addPath([
        //     "{http}" => realpath(__DIR__."/../"),
        // ]);
    }

    public function loadTheme($skin)
    {
        if( array_key_exists($skin, ($themes = $this->hydra->module("themes"))) )
        { 
            if( method_exists(($skin = $themes[$skin]), "helper") ) 
            {
                if( $this->app["files"]->exists($skin->helper()) )
                {
                    $this->app["view"]->share([
                        "skin" => new \Hydra\Support\Skin($skin),
                    ]);
                    
                    require_once($skin->helper());
                }
            }
        }
    }

    public function loadGrammary( $lang )
    {
        if( $this->file->exists( ($file = __path("{grammary}/$lang.php")) ) )
        {
            if( !is_object( ($grammary = $this->file->requireOnce($file)) ) ) {
                abort(500, "Error translate");
            }

            ## SET LOCALES
            if( method_exists($grammary, "header") )
            {
                $header = $grammary->header();

                $this->app->setLocale( $header["slug"] );

                ## LOAD LINES
                if( method_exists($grammary, "lines") ) {    
                    $this->lang->addLines($grammary->lines(), $header["slug"]);
                }
            }
        }        
    }

    public function loadMiddleware($store)
    {
        ## STARTED
        if( !empty( ($started = $store->start() ) ) ) 
        {
            foreach($started as $middleware ) {
                $this->http->pushMiddleware( $middleware );
            }
        }
  
        ## GROUPS
        if( !empty( ( $groups = $store->groups() ) ) )
        {
            foreach( $groups as $name => $group ) {
                $this->app["router"]->middlewareGroup($name, $group);
            }
        }
  
        ## ROUTES
        if( !empty( ($routes = $store->routes() ) ) )
        {
            foreach($routes as $route => $middleware ) {
                $this->app["router"]->middleware( $route, $middleware );
            }
        }
    }
}