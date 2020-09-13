<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Users\Location;
use Illuminate\Http\Request;
Use App\Models\Platform\Bounties\Bounty;
use App\Models\Platform\Bounties\BountyTask;
use App\Models\Platform\Bounties\BountySubscription;
use App\Models\Platform\Bounties\BountyChallenge;


class BountyController extends Controller
{
    //

    public function bounties(){
        if(Bounty::all()){
            return response()->json([
                'status' => true,
                'message' => Bounty::all()
            ]);
        }
    }

    public function challenges(Request $request, $bounty){

    }

    public function tasks($task){

    }

}
