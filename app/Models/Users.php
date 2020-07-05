<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';

    public function words()
    {
        return $this->hasMany('App\Models\Words');
    }
}