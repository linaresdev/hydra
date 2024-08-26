<?php
namespace Hydra\Core\Support;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

class Hydra 
{
    protected static $app;

    public function __construct( $app ) {
		self::$app = $app;
	}
    public function app( $key=NULL, $args=[], $params=[] ) {
		return self::$app->load( $this, $key, $args, $params );
	}
    
    public function addUrl($taggs=[]) {
		return $this->app("urls")->addTag("urls", $taggs);
	}

    public function addPath($taggs=[]) {
		return $this->app("urls")->addTag("paths", $taggs);
	}

	public function initialize($module)
	{
		return $this->app("load")->loadModule($module);
	}

	public function modules()
	{
		return $this->app("load")->modules();
	}
	public function module($key)
	{
		return $this->app("load")->module($key);
	}
	public function publicDir() {
		return public_path($this->app("urls")->baseDir());
	}

	public function start()
	{ 
		if(($DB =  $this->app("store"))->has("apps") )
		{
			if( $DB->empty("apps") )
			{ 
				if( ( $app = $DB->getApp("core", "core")) != null )
				{
					return $app->activated;
				}				
			}
		}

		return false;
	}
	
}