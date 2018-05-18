<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function home() {
        
        $user = Auth::user();

        $choirs = Auth::user()->choirsMember()->get();

        $admins = $choirs->mapWithKeys(function($c) {
            return [ $c->id => $c->admins()->get()->mapWithKeys(function($admin) {
                        return [ $admin->id => $admin->name ];
                    })
                ];
        });

        $choirsWithKeys = $choirs
            ->mapWithKeys(function($c) { return [ $c->id => $c ]; })
            ->toArray();

        $store = [
            'userId' => $user->id,
            'choirsMember' => $choirsWithKeys,
            'choirsAdmin' => $user->choirsAdmin()->get()->toArray(),
            'admins' => $admins,
            'news' => $user->news()->get()->toArray()
        ];

        return view('/home', [ 'store' => $store ]);
    }
}
