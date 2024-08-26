<?php
/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

if( !function_exists("hydra") ) {
    function hydra($key=null, $arg=null ) {
        return \Hydra\Core\Facade\Hydra::app($key, $arg);
    }
}
## PATH
if( !function_exists("__path") ) {
    function __path($key=null) {
       return hydra("urls")->path($key);
    }
}
 
## URLS
if( !function_exists("__url") )
{
    function __url($uri=null, $parameters=[], $secure=null ) {
        return hydra("urls")->url($uri, $parameters, $secure);
    }
}

if( !function_exists("__back") ) {
    function __back($to=null) {
        if($to != null ) {
            return redirect()->to(__url($to));
        }
        return back();
    }
}

if( !function_exists("__isUrl") ) {
    function __isUrl($path=null) {
        if( $path != null ) {
            return (request()->path() == $path);
        }
        return false;
    }
}
 
## SEGMENT
if( !function_exists("__segment") ) {
function __segment( $index=null, $match=null ) {
    if(is_null($index) ) return request()->segments();

    if( is_numeric($index) ) {
        $segment = request()->segment($index);

        if( !is_null($match) ) {
            return ($segment == $match);
        }

        return $segment;
    }
}
}

/*
* BOOTSTRAP HELEPERS */ 
if( !function_exists("mdi") )
{
    function mdi($slug=null) {
        return '<i class="mdi mdi-'.$slug.'"></i> ';
    }
}