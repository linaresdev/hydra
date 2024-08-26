<?php
namespace Hydra\Install\Support;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use App\Models\User;

class Account {

    public function data() {
        $data['title'] = 'Cuenta Administrativa';
        return $data;
    }
    
    public function register($request)
    {
        $user   = new User;  
        
        $validate = $request->validate([
            "name"          => "required",
            "email"         => "required|email|unique:users,email",
            "password"      => "required",
            "confirm"       => "same:password"
        ]);

        $data = $request->all();

        if( ($account = $user->create($data)) )
        {
            return redirect("forge/end");
        }

        return redirect("forge/account");
    }
}