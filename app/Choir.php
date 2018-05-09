<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choir extends Model
{
    public function member() {
        return $this->belongsToMany('App\User', 'members_choir_user');
    }

    public function admin() {
        return $this->belongsToMany('App\User', 'admins_choir_user');
    }
}
