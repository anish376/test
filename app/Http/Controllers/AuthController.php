<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request){
        
        $validator = Validator::make($request->all(),[
            'email'     =>  'required|email',
            'password'  =>  'required'  
        ]);

        if($validator->fails())
        {
            return response()->json(['status_code'=> 400, 'message'=>'Bad Request']);
        }

        $credentials = request(['email','password']);

        if(!Auth::attempt($credentials))
        {
            return response()->json([
                'status_code' => 500 ,
                'message' => 'Unauthorized'
            ]);
        } 
        
        $user = User::where('email', $request->email)->first();

        $tokenResult = $user->createToken('authtoken')->plainTextToken;

        return response()->json([
            'status_code'   =>  200,
            'token'         =>  $tokenResult
        ]);
        
    }

    public function logOut(Request $request)
    {
        Auth::user()->currentAccessToken()->delete();
        return response()->json([
            'status_code'   =>  200,
            'message'       =>  'Token Deleted Successfully'
        ]);
    }
}
