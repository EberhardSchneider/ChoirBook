<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function comments() {
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function choir() {
        return $this->belongsTo('App\Choir');
    }

    public function creator() {
        return $this->belongsTo('App\User');
    }

    public function image() {
        return $this->hasOne('App\Image');
    }
}
