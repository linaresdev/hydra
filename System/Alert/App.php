<?php
/*
*---------------------------------------------------------
* © Alerts Functions
*---------------------------------------------------------
*/

$this->loadViewsFrom(__DIR__."/Views", "alert");

## SHARE


$data["border"] = (function($tag=null)
{
    if( session()->has("errors") ) {        
        return " border border-danger";
    }

    if( !empty($tag) )
    {
        if( session()->has("alert.$tag.status") )
        {
            return " border border-".session()->get("alert.$tag.status");
        }        
    }
    else {
        if( session()->has("alert.status") )
        {
            return " border border-".session()->get("alert.status");
        } 
    }
});

$data["emoBox"] = (function($tag=null)
{
    // ## From Form Error
    // if( session()->has("errors") ) {
    //     return " border border-danger";
    // }
    // else{
    //     ## From Custom Errors
    //     if( empty($tag) ) {
    //         return session()->get("alert.")
    //     }
    // }    
});

$this->app["view"]->share($data);