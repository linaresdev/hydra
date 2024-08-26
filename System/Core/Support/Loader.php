<?php
namespace Hydra\Core\Support;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

class Loader {

	protected static $app;

    protected $modules = [];

	public function __construct( $app ) {
		self::$app   = $app;
	}

    public function callInstanceStringClass( $driver )
    {
        if(is_string($driver))
        {
            if( class_exists($driver) ) {
                $driver = new $driver;
            }
        } 

        return $driver;
    }

    public function getModuleFromDB($module)
    {
        $data = self::$app["db"]->table("apps")
                    ->where("type", $module)
                    ->get();

        $out = null;
        
        foreach( $data as $row )
        {
            if( $row->activated == 1 && is_object( ($driver = $this->run($row->driver)) ) )
            {
                $out[$row->slug] = $driver;
            }            
        }

        return ( !empty($out) )? $out : [];
    }

    public function loadModule( $module )
    {
        if( !array_key_exists( ($key = \Str::plural($module) ), $this->modules) )
        {   
            if( !empty( ($modules = $this->getModuleFromDB($module)) ) ) 
            {
                $this->modules[$key] = $modules;
            }
        }
    }

    public function modules()
    {
        return $this->modules;
    }

    public function module($key=null)
    {
        if( array_key_exists($key, $this->modules) )
        {
            return $this->modules[$key];
        }
    }

	/*
	* ALIASES
	* Load Alias */
	public function loadAlias($alias=NULL)
    {
		if(!empty($alias) && is_array($alias))
        {
			foreach ($alias as $alia => $class) {
				\Illuminate\Foundation\AliasLoader::getInstance()->alias($alia, $class);
			}
		}
	}

	/*
	* PROVIDERS
	* Load ServiceProvider */
	public function loadProviders($providers=[]) {
		if( !empty($providers) )
        {
            if(!is_array($providers)) $providers = [$providers];

            foreach ($providers as $provider) {
                self::$app->register($provider);
            }
        }
	}

   /*
   * RUN
   * Iniciar modulo de forma manual */
    public function run($driver=NULL)
    {
        if( !empty(($driver = $this->callInstanceStringClass($driver))) )
        {                      
            ## Handler instance
            if( method_exists($driver, "handler") ) {
                $driver->handler(self::$app);
            }

            ## Libraries
            if( method_exists($driver, "drivers") )
            {
                if( !empty(($drivers = $driver->drivers())) && is_array($drivers) )
                {
                    foreach($drivers as $subDriver)
                    {
                        $this->run($subDriver);
                    }
                }
            }
            
            ## Providers
            if( method_exists($driver, "providers") )
            {
                if( !empty( ($providers = $driver->providers()) ) ) {
                    $this->loadProviders( $providers );
                }
            }

            ## Alias
            if( method_exists($driver, "alias") ) {
                $this->loadAlias( $driver->alias() );
            } 
            
            return $driver;
        }
    }
}