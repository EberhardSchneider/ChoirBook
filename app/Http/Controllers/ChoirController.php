<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Choir;
use Illuminate\Support\Facades\Auth;

class ChoirController extends Controller
{
    public function getMember() {
        $user = Auth::user();
        $choirs = $user->allAdmins();
        return response()->json(['choirs' => $choirs]);
    }

    public function getAdmin() {
        $user = Auth::user();
        $choirs = $user->choirsAdmin()->get()->toArray();
        return response()->json(['choirs' => $choirs]);
    }

    public function create(Request $request) {
        $name = $request->input('name');
        $description = $request->input('description');
        $location = $request->input('location');

        $choir = new Choir;
        $choir->name = $name;
        $choir->description = $description;
        $choir->location_id = $location;

        $choir->save();

        $user = Auth::user();
        $user->choirsMember()->attach($choir->id);
        $user->choirsAdmin()->attach($choir->id);
    }

    public function edit(Request $request, Choir $choir) {
        $name = $request->input('name');
        $description = $request->input('description');
        $location = $request->input('location');

        $choir->name = $name;
        $choir->description = $description;
        $choir->location_id = $location;
        $choir->save();
    }
}
