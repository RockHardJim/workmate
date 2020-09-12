<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Users\Location;
use App\Models\Users\Profile;
use Illuminate\Http\Request;
use App\Models\Users\User;
use Spatie\Geocoder\Geocoder;

class UserController extends Controller
{
    //

    public function location(Request $request)
    {
        $user = $request->user()->id;

        if ($request->isMethod('GET')) {
            if (!Location::where('user', $request->user()->username)->first()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Hi, we could not find your location please enrol your residential address'
                ]);
            } else {
                return response()->json([
                    'status' => true,
                    'message' => Location::where('user', $request->user()->username)->first()
                ]);
            }
        } else {
          if(!Location::where('user', $request->user()->username)->first()){

              $client = new \GuzzleHttp\Client();

              $geocoder = new Geocoder($client);

              $geocoder->setApiKey(config('geocoder.key'));

              $geocoder->setCountry(config('geocoder.country', 'ZA'));

              $lats = $geocoder->getCoordinatesForAddress($request->json()->get('address'));

          Location::create([
              'user' => $request->user()->username,
              'address' => $request->json()->get('address'),
              'latitude' => $lats["lat"],
              'longitude' => $lats["lng"]
          ]);

              return response()->json([
                  'status' => true,
                  'message' => 'Hi, we have successfully saved your address which will allow you to participate in bounties placed in your area'
              ]);

        } else {
              return response()->json([
                  'status' => false,
                  'message' => 'Hi, it appears you have already have an address linked to your account'
              ]);
          }
        }
    }

    public function profile(Request $request){
        if ($request->isMethod('GET')) {
            if(!Profile::where('username', $request->user()->username)->first()){
                return response()->json([
                    'status' => false,
                    'message' => 'Hi, it appears we cannot find your profile please create your profile'
                ]);
            }else{
                return response()->json([
                        'status' => true,
                        'message' => Profile::where('user', $request->user()->username)->first()
                    ]);
            }
        } else {
            if(!Profile::where('username', $request->user()->username)->first()){
                Profile::create([
                    'user' => $request->user()->username,
                    'name' => $request->json()->get('name'),
                    'surname' => $request->json()->get('surname'),
                    'gender' => $request->json()->get('gender'),
                    'path' => $request->json()->get('path')
                ]);

                return response()->json([
                    'status' => true,
                    'message' => Profile::where('user', $request->user()->username)->first()
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Hi, it appears you already have an active profile'
                ]);
            }
        }
    }
}
