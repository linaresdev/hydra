<?php
namespace Hydra\Http\Middleware;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthMiddleware 
{
    protected $exerts = [
        "/",
        "auth",
        "logout",
        "getmembership",
    ];

    public function handle( $request, Closure $next, $guard = 'hydra')
    {
        $auth = Auth::guard($guard);
        
        if( $auth->guest($guard) && !in_array($request->path(), $this->exerts) ) {
            return redirect()->to("auth");
        }
        
        return $next( $request );
    }

}