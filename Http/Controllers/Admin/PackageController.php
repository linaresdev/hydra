<?php
namespace Hydra\Http\Controllers\Admin;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Hydra\Model\App;
use Hydra\Http\Support\Admin\PackageSupport;
use Hydra\Http\Controllers\Controller;

class PackageController extends Controller {

    public function __construct( PackageSupport $app ) {
        $this->boot($app);
    }

    public function index() {
        return (new App)->where("type", "package")->paginate(6);
    }
}