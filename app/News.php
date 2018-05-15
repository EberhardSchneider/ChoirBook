<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{

    protected $dateFormat = 'l jS \\of F Y h:i:s A';



    // relationships
    public function comments() {
        return $this->morphMany('App\Comment', 'commentable');
    }
    
    public function creator() {
        return $this->belongsTo('App\User');
    }
    
}
