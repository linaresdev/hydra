<?php
namespace Hydra\Http\Controllers;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Hydra\Alert\Facade\Alert;
use Hydra\Http\Support\AuthSupport;
use Hydra\Http\Requests\AuthRequest;

class AuthController extends Controller {

    public function __construct( AuthSupport $app )
    {
        $this->boot($app);
    }

    public function auth() {
        return $this->render('auth', $this->app->auth());
    }

    public function attempt( AuthRequest $request )
    {
        // $validator = \Validator::make([], []);
        // $validator->errors()->add('fieldName', 'This is the error message');
        //return back()->withErrors('your error message');

        //throw \Illuminate\Validation\ValidationException::withMessages(['This is the error message']);

        //throw new \Hydra\Alert\Exception\CustomFormError("Error de formulario");

    

        //Alert::tag("login")->errors(["Servicio a bajo", "Ups"]);

        return $this->app->attempt($request);
    }

    public function logout() 
    {
        return $this->app->logout();
    }
}