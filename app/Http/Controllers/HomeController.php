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

        $store = [
            'userId' => $user->id,
            'choirsMember' => $user->choirsMember()->get()->toArray(),
            'choirsAdmin' => $user->choirsAdmin()->get()->toArray(),
            'news' => $user->news()->get()->toArray()
        ];

        return view('/home', [ 'store' => $store ]);
    }
}
