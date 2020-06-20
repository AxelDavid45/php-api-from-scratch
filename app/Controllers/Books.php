<?php


namespace App\Controllers;


use Laminas\Diactoros\Response;
use App\User;

class Books
{
    public function index() : Response
    {
        $user = new User();
        $user->name = 'Axel Espinosa';
        $user->email = 'axel@axel.com';
        $user->birthday = '2000-08-22';
        $user->save();


        $resource = [
            'data' => [
                'type' => 'books',
                'id' => 1,
                'attributes' => [
                    'name' => 'Harry Potter',
                    'author' => 'Axel Espinosa Meneses',
                    'pages' => 50
                ]
            ]
        ];

        //Create the response and append in the body the data
        $response = new Response();
        $response->getBody()->write(json_encode($resource));

        return $response
            ->withHeader('content-type', 'application/vnd.api+json')
            ->withStatus(200);

    }
}