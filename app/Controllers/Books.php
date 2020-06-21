<?php


namespace App\Controllers;


use Laminas\Diactoros\Response;
use App\User;

class Books
{
    public function index() : Response
    {
        //Active record
        $user = new User();
        $user->name = 'Axel Espinosa Meneses';
        $user->email = 'axel@axeasl.com';
        $user->birthday = '2000-08-22';
        $user->token = 'asdasdasdasdasdasdasd';
        $user->save();


        $resource = [
            'data' => [
                'type' => 'books',
                'id' => 1,
                'attributes' => [
                    'name' => $user->name,
                    'author' => $user->email,
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