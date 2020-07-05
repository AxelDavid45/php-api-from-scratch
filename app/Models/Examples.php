<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Examples extends Model
{
    protected $table = 'examples';

    public function word()
    {
        $this->belongsTo('App\Models\Words');
    }

}