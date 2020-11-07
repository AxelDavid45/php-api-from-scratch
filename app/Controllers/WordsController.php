<?php


namespace App\Controllers;

use App\Models\Words;
use http\Env\Request;
use Laminas\Diactoros\Response;
use Laminas\Diactoros\ServerRequest;
use Laminas\Diactoros\ServerRequestFactory;

class WordsController
{
    public function index() : Response
    {
        $response = new Response();

        $words = Words::all()->map(
            function ($word) {
                return [
                    'type'          => 'words',
                    'id'            => $word->id,
                    'attributes'    => [
                        'id'      => $word->id,
                        'word'    => $word->word,
                        'picture' => $word->picture,
                    ],
                    'links'         => [
                        "self" => $_ENV['APP_URL'] . 'words/' . $word->id
                    ],
                    'relationships' => [
                        'author' => [
                            'data' => [
                                'type' => 'users',
                                'id'   => $word->user->id
                            ]

                        ]
                    ]
                ];
            }
        );

        $data = [
            [
                'data' => [
                    'results' => $words
                ]
            ]
        ];

        $response->getBody()->write(json_encode($data));

        $response
            ->withHeader('Content-Type', 'application/vnd.api+json')
            ->withStatus(200);
        return $response;
    }

    public function show(ServerRequest $request, array $args) : Response
    {
        $response = new Response();
        $data = Words::find($args['id']);

        if($data == null) {
            $data = [
                'errors' => [
                    'status' => 404,
                    'title' => 'The resource '.$args['id'] .' requested does not exists'
                ]
            ];

            $response->withHeader('Content-Type', 'application/vnd.api+json');
            $response->getBody()->write(json_encode($data));

            return $response->withStatus(404);
        }

        return $response;
    }
}