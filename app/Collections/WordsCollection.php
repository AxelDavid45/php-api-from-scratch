<?php


namespace App\Collections;


use App\Models\Words;
use Illuminate\Http\Resources\Json\JsonResource;
class WordsCollection
{
    private Words $model;

    public function __construct(Words $word)
    {
        $this->model = $word;
    }

    public function toArray() {
        return [
            'data' => [
                ''
            ]
        ];
    }
}