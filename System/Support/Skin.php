<?php
namespace Hydra\Support;

/*
*---------------------------------------------------------
* © Hydra Skin
*---------------------------------------------------------
*/

class Skin
{
    protected $app;

    protected $info;

    protected $slug; 

    public function __construct( $driver )
    {
        $this->info = $driver->info();
        $this->app  = $driver->app();
        $this->slug = $this->app["slug"];
    }

    public function get($key=null)
    {
        if(isset($this->{$key}) ) {
            return $this->{$key};
        }
    }

    public function path($uri="index") 
    {
        return "$this->slug::$uri";
    }

    public function view($view=NULL, $data=[], $mergeData=[])
    {
        if( view()->exists( ($path = $this->path($view)) ) ) {
            return view($path, $data, $mergeData);
        }

        return "ERROR 404 :: La vista {$path} no existe.";
    }
}