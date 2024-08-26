<?php
/*
*---------------------------------------------------------
* © MAIN ROUTES 
*---------------------------------------------------------
*/

Route::get("auth", "AuthController@auth");
Route::post("auth", "AuthController@attempt");

Route::get("logout", "AuthController@logout");

Route::get("register", "AuthContronroller@register");

Route::prefix("admin")->namespace("Admin")->group(function($route)
{
   Route::get("/", function(){
        return "AdminPanel";
   }) ;
});
