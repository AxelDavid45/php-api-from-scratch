<?php


namespace App\Controllers;


use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;

class HomeController
{
    public function index() : Response
    {
        $response = new Response();
        $body = [
          'data' => [
              'type' => 'Endpoints',
              'attributes' => [
                  'api/words',
                  'api/words'
              ]
          ]
        ];
        $response->getBody()->write(json_encode($body));
        return $response->withStatus(200);
    }
}