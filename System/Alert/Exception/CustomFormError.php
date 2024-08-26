<?php
namespace Hydra\Alert\Exception;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Exception;
// use Countable;
// use Throwable;
// use Illuminate\Contracts\Support\MessageBag as MessageBagContract;
// use Illuminate\Support\ViewErrorBag;

class CustomFormError extends Exception
{
    public function report()
    {
        // Additional logic to report the exception, if needed
    }

    public function render($request)
    {
        //return response()->view('errors.custom', [], 500);
    }
}