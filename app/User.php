<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function choirsMember() {
        return $this->belongsToMany('App\Choir', 'members_choir_user');
    }

    public function choirsAdmin() {
        return $this->belongsToMany('App\Choir', 'admins_choir_user');
    }

    public function events() {
        return $this->hasMany('App\Event');
    }

    public function news() {
        return $this->hasMany('App\News');
    }

    public function role() {
        return $this->belongsTo('App\Role');
    }

    public function choirsMemberWithKey() {
        return choirsMember()
            ->get()
            ->mapWithKeys(function($c) { return [ $c.id => $c ]; })
            ->toArray();
    }
}