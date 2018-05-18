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

    public function friendshipRequestsByMe() {
        return $this->belongstoMany('App\User', 'users_users_requests', 'user1_id', 'user2_id');
    }

    public function friendshipRequestsToMe() {
        return $this->belongsToMany('App\User', 'users_users_requests', 'user2_id', 'user1_id');
    }

    public function friends() {
        // be sure to enter friendships symetrical in table: 
        // every friendship has two entries (a,b) and (b,a)
        return $this->belongsToMany('App\User', 'users_users_friendships', 'user1_id', 'user2_id');
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
}