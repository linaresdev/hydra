<?php
namespace Hydra\Http\Controllers;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Hydra\Http\Support\AppSupport;
use Hydra\Http\Controllers\Controller;

class AppController extends Controller {

    public function __construct( AppSupport $app ) {
        $this->app = $app;
    }

    public function index() {
        return response("Hola Mundo");
    }
}