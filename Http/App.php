<?php
/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

## CONFIGS
$this->hydra->addPath([
    "{grammary}"    => "{system}/Grammaries",
    "{themes}"       => "{public}/themes",
]);

$this->hydra->addUrl([
    "{now}"   => request()->path()
]);

## GRAMMARIES
$this->loadGrammary("esDO");

## MIDDLEWARE
$this->loadMiddleware(new \Hydra\Http\Middleware\Handler());

## LOAD THEME
$this->loadTheme("light");

## VIEWS
$this->loadViewsFrom(__DIR__."/Views", "hydra");