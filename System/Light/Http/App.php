<?php
/*
*---------------------------------------------------------
* ©LIGHT THEME
*---------------------------------------------------------
*/


## CONFIGS
$this->hydra->addPath([
]);

$this->hydra->addUrl([
    "{light}"   => "{base}/themes/light"
]);
/*
** VIEWS */
$this->loadViewsFrom(__DIR__.'/Views', 'light');

## ASSETS
$this->publishes([
    __DIR__."/Assets" => __path("{themes}/light")
], "light");