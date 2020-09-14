<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Users\Location;
use Illuminate\Http\Request;
Use App\Models\Platform\Bounties\Bounty;
use App\Models\Platform\Bounties\BountyTask;
use App\Models\Platform\Bounties\BountySubscription;
use App\Models\Platform\Bounties\BountyChallenge;
use Spatie\Geocoder\Geocoder;
use Toin0u\Geotools\Geotools;


class BountyController extends Controller
{
    //

    public function bounties(){
        if(Bounty::all()){
            return response()->json([
                'status' => true,
                'message' => Bounty::all()
            ]);
        }else{
            return response()->json([
                'status' => true,
                'message' => 'No bounties posted yet'
            ]);
        }
    }

    public function challenges(Request $request)
    {
        $data = array();

        $challenges = Bounty::find($request->json()->get('bounty'))->profile;
        $user_location = Location::where('user', $request->user()->username);

        if ($challenges) {

        foreach ($challenges as $challenge) {

            $client = new \GuzzleHttp\Client();

            $geocoder = new Geocoder($client);

            $geocoder->setApiKey(config('geocoder.key'));

            $geocoder->setCountry(config('geocoder.country', 'ZA'));

            $lats = $geocoder->getCoordinatesForAddress($challenge->address);


            $user_loc = (new \Toin0u\Geotools\Geotools)->coordinate([$user_location->latitude, $user_location->longitude]);
            $challenge_loc = (new \Toin0u\Geotools\Geotools)->coordinate([$lats["lat"], $lats["lng"]]);
            $distance = (new \Toin0u\Geotools\Geotools)->distance()->setFrom($user_loc)->setTo($challenge_loc);

            if ($distance->in('km')->haversine() < 20) {
                $data[] = $challenge;
            }
        }
            return response()->json([
                'status' => true,
                'message' => $data
            ]);
        }else{
            return response()->json([
               'status' => false,
               'message' => 'Either there are no challenges posted for this bounty or the challenges are 20KM away from where your residential address'
            ]);
        }
    }

    public function tasks(Request $request){

    }

    public function subscribe(Request $request){
        
    }

}
