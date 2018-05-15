<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Choir;
use Illuminate\Support\Facades\Auth;

class ChoirController extends Controller
{
    public function getMember() {
        $user = Auth::user();
        $choirs = [];
        
        $choirs = $user->choirsMember()->get()->toArray();
        return response()->json(['choirs' => $choirs]);
    }
}
