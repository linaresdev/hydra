<?php
namespace Hydra\Install\Support;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Hydra\Model\App;
use Hydra\Core\Facade\Hydra;

class End 
{
    public function application() 
    {
        $app = (new App)->where("type", "core")
                        ->where("slug", "core");

        if( $app->count() > 0 )
        {
            $app = $app->first();

            $app->activated = 1;

            if( $app->save() )
            {
                $this->toggleMalla();

                return redirect('/');
            }
        }

        return back();
    }

    public function toggleMalla()
    {
        $env = str_replace (
            "HYDRA_START=false", 
            "HYDRA_START=true", 
            app("files")->get(base_path('.env'))
        );

        app("files")->put(base_path('.env'), $env);
    }
}