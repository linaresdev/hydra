<?php
namespace Hydra\Http\Support;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Hydra\Alert\Facade\Alert;

class AuthSupport
{
    public function auth()
    {
        $data['title'] = __("words.login");

        return $data;
    }

    public function attempt( $request, $guard="hydra" )
    {
        if( auth($guard)->attempt( $request->except("_token") ) )
        {
            return redirect("/");
        }
       
        return back()->withErrors(['Credenciales incorrectas']);
    }

    public function logout($guard="hydra")
    {        
        auth($guard)->logout();

        Alert::success(__("auth.success.logout"));

        return back();
    }
}