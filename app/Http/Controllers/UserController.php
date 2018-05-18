<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Choir;

class UserController extends Controller
{
    public function getAdminsOfChoirs() {

        $choirs = Auth::user()->choirsMember()->get();

        $admins = $choirs->map(function($c) {
            return $c->admins()->get()->map(function($admin) {
                return $admin->id;
            });
        });

        return response()->json($admins);
    }

    public function getAdminsList() {
        $choirs = Auth::user()->choirsMember()->get();

        $admins = $choirs->mapWithKeys(function($c) {
            return [ $c->id => $c->admins()->get()->mapWithKeys(function($admin) {
                        return [ $admin->id => $admin->name ];
                    })
                ];
        });

        return response()->json($admins);
    }
}
