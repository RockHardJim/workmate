<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Users\Location;
use Illuminate\Http\Request;
use App\Models\Users\User;

class UserController extends Controller
{
    //

    public function location(Request $request)
    {
        $user = $request->user()->id;

        if ($request->isMethod('GET')) {
            if (!User::find($user)->location) {
                return response()->json([
                    'status' => false,
                    'error' => 'Hi, we could not find your location please enrol your application'
                ]);
            } else {
                return response()->json([
                    'status' => true,
                    'data' => User::find($user)->location
                ]);
            }
        } else {
          Location::create([
              'user' => $request->user()->username,
              'address' => $request->address
          ]);
        }
    }
}
