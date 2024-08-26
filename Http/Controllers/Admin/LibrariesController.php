<?php
namespace Hydra\Http\Controllers\Admin;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Hydra\Model\App;
use Hydra\Http\Support\Admin\LibrarySupport;
use Hydra\Http\Controllers\Controller;

class LibrariesController extends Controller {

    public function __construct( LibrarySupport $app ) {
        $this->boot($app);
    }

    public function index() {
        $data = (new App)->where("type", "librarie")->paginate(5);

        return response($data);
    }
}