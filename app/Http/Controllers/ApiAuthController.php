<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiAuthController extends Controller
{


    public function register( Request $request )
    {
        $validated = $request->validate([
            'email' => 'required|unique:users,email,id',
            'name' => 'required',
            'password' => 'required',
        ]);

        $user = new User( $validated );
        $user->password = bcrypt( $request->password );
        $user->save();

        $token = $user->createToken('token-name')->plainTextToken;

        return response(['ok' =>  true, 'user' => $user, 'token' => $token], 200);
    }


    public function login( Request $request )
    {
        $credentials = $request->only('email', 'password');

        if ( !Auth::attempt($credentials)) {
            return response(['ok' => false], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('token-name')->plainTextToken;
        return response(['ok' =>  true, 'user' => $user, 'token' => $token], 200);
    }


    public function logout(Request $request )
    {
        // $user = Auth::user()->currentAccessToken();
        // return $user;
        $request->user()->currentAccessToken()->delete();
        // return Auth::user();
        // auth()->user->tokens()->delete();
        // $request->user()->currentAccessToken()->delete();
        return response(['ok' =>  true], 200);
    }
}
