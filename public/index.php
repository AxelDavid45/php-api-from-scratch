<?php

require_once "../vendor/autoload.php";
// Set the event dispatcher used by Eloquent models... (optional)
use Dotenv\Dotenv;
use Illuminate\Database\Capsule\Manager as Capsule;

//Loads environment variables
$dotenv = Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();


$capsule = new Capsule();

$capsule->addConnection(
    [
        'driver'    => 'mysql',
        'host'      => getenv('DATABASE_HOST'),
        'database'  => getenv('DATABASE'),
        'username'  => getenv('DATABASE_USR'),
        'password'  => getenv('DATABASE_PASS'),
        'charset'   => getenv('DATABASE_CHARSET'),
        'collation' => getenv('DATABASE_COLLATION')
    ]
);

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

//Create the object that standards the request
$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

//Create the router
$router = new League\Route\Router();
//Create a response factory PSR-17
$responseFactory = new \Laminas\Diactoros\ResponseFactory();
//Create the object JsonStrategy
$strategy = new League\Route\Strategy\JsonStrategy($responseFactory);
//Set the strategy
$router->setStrategy($strategy);

//Routes
$router->get('/books', 'App\Controllers\Books::index');

//Dispatch the response
$response = $router->dispatch($request);
// send the response to the browser
(new Laminas\HttpHandlerRunner\Emitter\SapiEmitter)->emit($response);