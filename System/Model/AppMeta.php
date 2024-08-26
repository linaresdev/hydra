<?php
namespace Hydra\Model;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

class AppMeta 
{
    private static $data = [];

    public function __construct($data) 
    {
        foreach( $data->where("type", "info")->get() as $row ) {
            self::$data[$row->key] = $row->value; 
        }
    }

    protected function __call($method, $args)
    {
        if( array_key_exists($method, self::$data) )
        {
            return self::$data[$method];
        }

        return null;
    }
}