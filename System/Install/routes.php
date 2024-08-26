<?php
/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Illuminate\Http\Request;
use Hydra\Install\Support\End;
use Hydra\Install\Support\Env;
use Hydra\Install\Support\Home;
use Hydra\Install\Support\Database;
use Hydra\Install\Support\Account;

Route::prefix("forge")->group(function($route){

    Route::get("/", function() {
        return view("install::index", (new Home)->data());
    });

    Route::prefix("env")->group(function($route)
    {
        Route::get("/", function() {
            return view("install::env", (new Env)->data());
        });
        
        Route::post("/", function( Request $request ) {
            return (new Env)->update($request);
        });
        
        Route::get("/extra", function() {
            return (new Env)->extra();    
        });
        Route::get("/publish", function() {
            return (new Env)->publish();    
        });
    });

    Route::prefix("database")->group(function($route)
    {
        Route::get("/", function() {
            return view("install::database", (new Database)->data());
        });

        Route::get("/migrate/{dbopt}", function($opt) {
            return (new Database)->migrate($opt);
        });
    });

    Route::get( "account", function() {
        return view("install::account", (new Account)->data());
    });
    Route::post( "account", function(Request $request) 
    {
        return (new Account)->register($request);
    });


    Route::get("end", function(){
        return (new End)->application();
    });
});