<?php

require_once "../vendor/autoload.php";
// Set the event dispatcher used by Eloquent models... (optional)
use Dotenv\Dotenv;
use Illuminate\Database\Capsule\Manager as Capsule;

//Loads environment variables
$dotEnv = Dotenv::createImmutable(__DIR__.'/../');
$dotEnv->load();


$capsule = new Capsule();

$capsule->addConnection(
    [
        'driver'    => 'mysql',
        'host'      => $_ENV['DATABASE_HOST'],
        'database'  => $_ENV['DATABASE'],
        'username'  => $_ENV['DATABASE_USR'],
        'password'  => '',
        'charset'   => $_ENV['DATABASE_CHARSET'],
        'collation' => $_ENV['DATABASE_COLLATION']
    ]
);

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();
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