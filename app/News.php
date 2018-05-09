<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public function comments() {
        return $this->morphMany('App\Comment', 'commentable');
    }
    
    public function creator() {
        return $this->belongsTo('App\User');
    }
    
}
