<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Users\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Users\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    /***
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request){
            $user = User::where('username', $request->json()->get('username'))->first();
            if(!$user){
                return response()->json([
                    'status' => false,
                    'message' => 'Hi, we could not find the user account you are trying to access'
                ], 404);
            } else {
                if(!Auth::attempt(['username' => $request->json()->get('username'), 'password' => $request->json()->get('password')])){
                    return response()->json([
                        'status' => false,
                        'message' => 'Hi, ensure you have entered correct login credentials'
                    ], 500);
                } else {
                    $token = $user->createToken('authToken')->plainTextToken;
                    $profile = Profile::where('user', $request->json()->get('username'))->first();

                    if(!$profile):
                        $profile = false;
                    endif;

                    return response()->json([
                        'status' => $status = ($profile === false ? false : true),
                        'token' => $token,
                        'type' => 'Bearer',
                        'profile' => $profile
                    ], 200);
                }
            }
    }

    public function register(Request $request){
            $user = User::where('username', $request->json()->get('username'))->first();

            if(!$user) {
                if (!User::where('cellphone', $request->json()->get('cellphone'))->first()) {
                    $model = new User();

                    $model->username = $request->json()->get('username');
                    $model->cellphone = $request->json()->get('cellphone');
                    $model->password = hash::make($request->json()->get('password'));
                    $model->save();

                    return response()->json([
                        'status' => true,
                        'message' => 'Hi, we have successfully registered your account please proceed to login to use the platform'
                    ], 200);
                } else {
                    return response()->json([
                        'status' => false,
                        'message' => 'Hi, it appears you already have an account with us'
                    ], 500);
                }
            }else{
                return response()->json([
                    'status' => false,
                    'message' => 'Hi, it appears you already have an account with us'
                ], 500);
            }
        }

    public function logout(Request $request){

    }
}
