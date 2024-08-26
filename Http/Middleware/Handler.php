<?php
namespace Hydra\Http\Middleware;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

class Handler
{
    public function start()
    {
        return [
            //\Malla\Http\Middlewares\MallaMiddleware::class,
        ];
    }

    public function groups()
    {
        return [
            "hydra" => [
                \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
                \Illuminate\Session\Middleware\StartSession::class,
                \Illuminate\View\Middleware\ShareErrorsFromSession::class,
                \Illuminate\Routing\Middleware\SubstituteBindings::class,
                \Hydra\Http\Middleware\AuthMiddleware::class,
            ]
        ];
    }

    public function routes() {
        return [];
    }
}