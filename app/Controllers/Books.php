<?php


namespace App\Controllers;


use Laminas\Diactoros\Response\JsonResponse;


class Books
{
    public function index() : JsonResponse
    {
        $jsonResponse = [
            'data' => [
                'type' => 'books',
                'id' => 1,
                'attributes' => [
                    'name' => 'Harry Potter',
                    'author' => 'Axel',
                    'pages' => 50
                ]
            ]
        ];

        return new JsonResponse($jsonResponse, 200, [
            'content-type' => 'application/vnd.api+json'
        ]);

    }
}