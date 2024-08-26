<?php
namespace Hydra\Alert\Support;

/*
*---------------------------------------------------------
* ©Support Alert
*---------------------------------------------------------
*/

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class Alert {

    protected $request;

    protected $tag;

    protected $methods = [
        "errors", "danger", "info", "warning", "success"
    ];

    protected $stors = [];

    public function load() {
        return $this;
    }

    public function tag($slug)
    {
        $this->tag = $slug; return $this;
    }
    protected function makeErrors($args)
    {
        if( empty( ($tag = $this->tag) ) )
        {
            $data["alert.status"]     = 1;
            $data["alert.type"]     = "danger";

            if( is_array($args) ) {
                foreach($args[0] as $key => $arg ) {
                    $data["alert.message.$key"] = $arg;
                }
            }                    
        }
        else {
            $data["alert.$tag.status"]   = 1;
            $data["alert.$tag.type"]     = "danger";
            
            if( is_array($args[0]) )
            {
                foreach($args[0] as $key => $arg ) {
                    $data["alert.$tag.message.$key"] = $arg;
                }
            }
            else {
                $data["alert.$tag.message.0"] = $args[0];
            }
        }       
        
        foreach($data as $key => $value ) {
            session()->flash($key, $value);
        }

        return $this;
    }

    public function makeFlashSessionAlert( $tag=null )
    {

    }

    public function tagged($slug)
    {
        if( session()->has("alert.$slug.status") )
        { 
            if( session()->get("alert.$slug.status") )
            {
                dd(session()->get("alert.$slug"));
            }
        }
    }

    public function form( $slug=null, $skin="alert::simpleErrorForm" )
    {
        ## Exception FormRequest
        if( ($session = session())->has("errors")  ) 
        {
            // return view($skin, [
            //     "messages" => $session->get("errors")->all()
            // ]);
        }

        ## Custom Error 
        if( session()->has("alert.$slug.status") ) 
        {

        }
        
    }   

    public function __call( $type, $args )
    {
        if( in_array( $type, $this->methods ) )
        {
            ## ERRORS && EMPTY TAG
            if( $type == "errors" ) {
                return $this->makeErrors($args);
            }

            if( $type != "errors" ) {
                dd("OK");
            }

            return $this;
        }
    }

    public function boder() {
        if( ($session = session())->has("errors")  )
        {
            return " border border-danger";
        }
    }
}