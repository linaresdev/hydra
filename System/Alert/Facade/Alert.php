<?php
namespace Hydra\Alert\Facade;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Illuminate\Support\Facades\Facade;

class Alert extends Facade {
    public static function getFacadeAccessor(){return 'Alert';}
}