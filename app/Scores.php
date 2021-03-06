<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scores extends Model
{
    protected $fillable = ['round_id', 'photo_id', 'tens', 'calc_score', 'average_arrow'];

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
