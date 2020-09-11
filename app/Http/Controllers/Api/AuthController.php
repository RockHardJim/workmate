<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Users\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    /***
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request){
        $v = Validator::make($request->all(),[
           'username' => 'required|min:3|max:30',
           'password' => 'required|min:5|max:15'
        ]);

        if($v->fails()) {
            return response()->json([
                'status' => false,
                'error' => 'Hi, please ensure your form has been filled in correctly'
            ], 404);
        } else {
            $user = User::where('username', $request->username)->first();
            if(!$user){
                return response()->json([
                    'status' => false,
                    'error' => 'Hi, we could not find the user account you are trying to access'
                ], 404);
            } else {
                if(!Auth::attempt(['username' => $request->username, 'password' => $request->password])){
                    return response()->json([
                        'status' => false,
                        'error' => 'Hi, ensure you have entered correct login credentials'
                    ], 500);
                } else {
                    $token = $user->createToken('authToken')->plainTextToken;
                    $profile = Profile::where('user', $request->username)->first();

                    if(!$profile):
                        $profile = false;
                    endif;

                    return response()->json([
                        'token' => $token,
                        'type' => 'Bearer',
                        'profile' => $profile
                        ]);
                }
            }
        }
    }

    public function register(Request $request){
        $v = Validator::make($request->all(), [
            'username' => 'required|min:3|max:30',
            'cellphone' => 'required|min:10|max:10',
            'password' => 'required|min:5|max:15'
        ]);

        if($v->fails()) {
            return response()->json([
                'status' => false,
                'error' => 'Hi, please ensure your form has been filled in correctly'
            ], 500);
        } else {
            $user = User::where('username', $request->username)->first();

            if(!$user){
                $model = new User();

                $model->username = trim($request->username);
                $model->cellphone = trim($request->cellphone);
                $model->password = hash::make($request->password);
                $model->save();
            } else {
                return response()->json([
                    'status' => false,
                    'error' => 'Hi, please ensure your form has been filled in correctly'
                ], 500);
            }
        }
    }

    public function logout(Request $request){

    }
}
