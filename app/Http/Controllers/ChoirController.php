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

    public function create(Request $request) {
        $name = $request->input('name');
        $description = $request->input('description');
        $location = $request->input('location');

        $choir = new Choir;
        $choir->name = $name;
        $choir->description = description;
        $choir->location = location;

        $choir->save();

        $user = Auth::user();
        $user->choirsMember()->attach($choir->id);
        $user->choirsAdmin()->attach($choir->id);
    }
}
