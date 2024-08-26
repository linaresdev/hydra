<?php
namespace Hydra\Install\Support;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

class Env
{
    public function data()
    {
        $data['title']  = __("Ambiente Laravel");
        $data["env"]    = app("files")->get(base_path('.env'));

        return $data;
    }

    public function extra()
    {
        if( empty(env("HYDRA_PUBLIC_DIR")) )
        {
            $stub   = app("files")->get(__DIR__."/../env.txt");
            $env    =  app("files")->get(base_path('.env'));
            
            if(!app("files")->exists(__DIR__."/../envbase"))
            {
                app("files")->put(__DIR__."/../envbase", $env);
            }
            
            $env = str_replace("APP_URL=".env("APP_URL"), $stub, $env);
            
            app("files")->put(base_path('.env'), $env);
        }

        return redirect("forge/env");
    }

    public function update($request)
    {
        if( !empty( ($env = $request->env)) ) 
        {
            if( $request->has("password") )
            {
                $HASH = \Hash::make($request->password);
                $env = str_replace("HYDRA_HASH", "HYDRA_HASH=".$HASH, $env);
            }

            app("files")->put(base_path('.env'), $env);
        }

        return back();
    }

    public function publish()
    {
        \Artisan::call("vendor:publish", [
            "--tag" => "hydra", "--force" => true
        ]);
        
        return back();
    }
}