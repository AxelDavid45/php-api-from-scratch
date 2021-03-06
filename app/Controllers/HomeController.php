<?php


namespace App\Controllers;


use Laminas\Diactoros\Response;

class HomeController
{
    public function index(): Response
    {
        $response = new Response();
        $body = [
            'data' => [
                'type' => 'endpoints',
                "words" => $_ENV['APP_URL'] . 'words/',
                "meanings" => $_ENV['APP_URL'] . 'meanings/',
                "examples" => $_ENV['APP_URL'] . 'examples/',
                "synonyms" => $_ENV['APP_URL'] . 'synonyms/',

            ]
        ];

        //Send the json
        $response->getBody()->write(json_encode($body));
        //Headers
        $response
            ->withHeader('Content-Type', 'application/vnd.api+json')
            ->withStatus(200);

        return $response;
    }
}