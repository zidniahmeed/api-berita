<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AuthApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register']]);
    }


    public function register(Request $request){
        // return 'test';
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'role' => 'required|string|max:255',
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => 'required|string|min:6',
        // ]);

        // return 'test';
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'user',
            'password' => Hash::make($request->password),
        ]);

        $token = Auth::login($user);
        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
            'user' => $user,
            'authorisation' =>[
                'token' => $token,
                'type' => 'bearer'
            ]
        ]);
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);
        $credential = $request->only('email', 'password');    
        $token = Auth::attempt($credential);
        if(!$token){
            return response()->json([
                'status' => 'error',
                'message' => 'Unautorized'
            ]);
        }
        $user = Auth::user();
        return response()->json([
            'status' => 'success',
            'user' => $user,
            'authorisation' =>[
                'token' => $token,
                'type' => 'bearer'
            ]
            ]);

    }

    public function refresh(){
        $user = Auth::user();
        return response()->json([
            'status' => 'success',
            'user' => $user,
            'authorisation' =>[
                'token' => Auth::refresh(),
                'type' => 'bearer'
            ]
            ]);
    }

    public function logout(){
        Auth::logout();
        return response()->json([
            'status' => 'success',
            'messages' => 'logout berhasil'
            ]);

    }

    public function getMe(){
        return response()->json(Auth::user());
    }


}
