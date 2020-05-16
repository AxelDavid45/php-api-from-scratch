<?php
require_once "../vendor/autoload.php";
//Create the object that standards the request
$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

$httpMethod = $request->getMethod();
$uri = $request->getUri()->getPath();

//Create the dispatcher with routes
$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector
$route) {
    //Create a route
    $route->addRoute('GET', '/books', [
        'App\Controller\Books',
        'index'
    ]);
});


$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
var_dump($routeInfo[0]);