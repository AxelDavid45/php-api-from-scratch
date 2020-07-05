<?php

//Home endpoint
$router->get('/', 'App\Controllers\HomeController::index');

//Api container
$router->group(
    '/api',
    function (\League\Route\RouteGroup $route) {
        //Words endpoints
        $route->get('/words', 'App\Controllers\WordsController::index');
        $route->get('/words/{id}', 'App\Controllers\WordsController::show');



    }
);