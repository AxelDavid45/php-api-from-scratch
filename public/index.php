<?php

require_once "../vendor/autoload.php";
// Set the event dispatcher used by Eloquent models... (optional)
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
use Illuminate\Database\Capsule\Manager as Capsule;

//Loads environment variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


$capsule = new Capsule;

$capsule->addConnection(
    [
        'driver'    => 'mysql',
        'host'      => getenv('DATABASE_HOST'),
        'database'  => getenv('DATABASE'),
        'username'  => getenv('DATABASE_USR'),
        'password'  => getenv('DATABASE_PASS'),
        'charset'   => getenv('DATABASE_CHARSET'),
        'collation' => getenv('DATABASE_COLLATION'),
        'prefix'    => '',
    ]
);


$capsule->setEventDispatcher(new Dispatcher(new Container));

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

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