<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Words extends Model
{
    protected $table = 'words';

    public function meanings()
    {
        return $this->hasMany('App\Models\Meanings');
    }

    public function examples()
    {
        return $this->hasMany('App\Models\Examples');
    }

    public function synonyms()
    {
        return $this->hasMany('App\Models\Synonyms');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\Users', 'user_id');
    }

}