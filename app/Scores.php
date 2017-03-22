<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scores extends Model
{
    protected $fillable = ['round_id', 'photo_id', 'tie_breaker', 'score', 'average_score'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function photo(){
        return $this->belongsTo('App\Photo');
    }

    public function round(){
        return $this->belongsTo('App\Round');
    }


}
