<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use JWTAuth;
use JWTAuthException;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\User;

class ApiController extends Controller
{

    public function __construct()
    {
        $this->user = new User;
    }

    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');
        $token = null;
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'response' => 'error',
                    'message' => 'invalid_email_or_password',
                ]);
            }
        } catch (JWTAuthException $e) {
            return response()->json([
                'response' => 'error',
                'message' => 'failed_to_create_token',
            ]);
        }
        $user = auth()->user();
        $user->auth_key =$token;
        $user->save();
        return response()->json([
            'response' => 'success',
            'result' => [
                'token' => $token,
            ],
        ]);
    }
    public function register(Request $request){
        $register = new RegisterController();
        if($register->validator($request->all()) && $register->create($request->all())){
            return response()->json(['status'=>'success']);
        }
    }
    public function logout(){

        auth()->logout(true);
        return response()->json(['status'=>'success']);
    }

    public function getAuthUser(Request $request)
    {
        $user = JWTAuth::toUser($request->token);
        return response()->json(['result' => $user]);
    }

}