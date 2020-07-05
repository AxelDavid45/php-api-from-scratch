<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Meanings extends Model
{
    protected $table = 'meanings';

    public function word()
    {
        $this->belongsTo('App\Models\Words');
    }
}