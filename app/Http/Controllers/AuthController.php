<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user= User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> bcrypt($request->password)
        ]);
        $accessToken=$user->createToken('authToken')->accessToken;

        response(['']);

    }
}
