<?php
namespace Hydra\Install\Support;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Hydra\Model\App;
use Hydra\Core\Facade\Hydra;
use Illuminate\Support\Facades\Schema;

class Database
{
    protected $libraries = [
        \Hydra\Core\Driver::class,
    ];

    public function __construct()
    {        
    }

    public function data() {

        $data['title'] = __("Base de datos");

        $data["hydraStart"] = Hydra::start();

        if( Hydra::app("store")->has("apps") )
        {
            $data["apps"] = (new App)->paginate(10);
        }
        
        $data["icon"] = (function($slug)
        {
            $data['core']       = 'mdi-heart-pulse';
            $data["library"]    = "mdi-shape-outline";
            $data['package']    = 'mdi-package-variant-closed';
            $data['theme']      = 'mdi-format-paint';


            if( array_key_exists($slug, $data) )
            {
                return '<span class="mdi '.$data[$slug].' mdi-24px"></span>';
            }

            return $slug;
        });
       
        return $data;
    }

    public function migrate( $slug=null )
    {
        
        if( method_exists($this, $slug) )
        {
            $this->{$slug}();
        }

        return back();
    }

    public function install()
    {
        \Artisan::call("migrate");
        
        $this->drivers("install");
    }

    // public function saveLibraries()
    // {
    //     foreach( $this->libraries as $library ) 
    //     {
    //         if( class_exists($library) )
    //         {
    //             if( method_exists(($lib = new $library), "install") )
    //             {
    //                 $lib->install(new App);
    //             }
    //         }
    //     }
    // }

    public function drivers($action="install")
    {
        foreach( $this->libraries as $library ) 
        {
            if( class_exists($library) )
            {
                if( method_exists(($lib = new $library), $action) )
                {
                    $lib->{$action}(new App);
                }
            }
        }
    }

    public function reset()
    {
        $this->drivers("destroy");

        \Artisan::call("migrate:reset");
        
        return back();
    }

    public function refresh()
    {
        $this->reset();
        $this->install();

        return back();
    }
}