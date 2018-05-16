<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class News extends Model
{

    // public function getCreatedAtAttribute($value) {
    //     return new Carbon($value);
    // }

    // relationships
    public function comments() {
        return $this->morphMany('App\Comment', 'commentable');
    }
    
    public function creator() {
        return $this->belongsTo('App\User');
    }
    
}
