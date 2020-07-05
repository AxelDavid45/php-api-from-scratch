<?php


namespace App\Controllers;


use Laminas\Diactoros\Response;

class HomeController
{
    public function index() : Response
    {
        $response = new Response();
        $body = [
          'data' => [
              'type' => 'endpoints',
              'attributes' => [
                  $_ENV['APP_URL'].'/api/words/',
                  $_ENV['APP_URL'].'/api/meanings/',
                  $_ENV['APP_URL'].'/api/examples/',
                  $_ENV['APP_URL'].'/api/synonyms/',

              ]
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