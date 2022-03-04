<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6'],
        ]);

        // cheech if the user is validate
        // if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        //     //return  the user token
        //     return auth()->user();
        // }
        // $token = $request->user()->createToken($request->token_name);
        // return ['token' => $token->plainTextToken];
        //return Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // return auth()->user()->createToken('key');
            return auth()->user()->createToken('key')->plainTextToken;
        }
        return 'no . you dont have access';
    }

    public function singup(Request $request)
    {

        $request->validate([
            'name' => ['required', 'alpha'],
            'email' => ['required', 'unique:users,email'],
            'password' => ['required', 'min:6'],
            'gender' => ['required'],
            'mobile' => ['required'],
            'address' => ['required'],
            'city' => ['required'],
            'birthday' => ['required'],
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'city' => $request->city,
            'birthday' => $request->birthday,
        ]);
        //     if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        //         // return auth()->user()->createToken('key');
        //         return auth()->user()->createToken('key')->plainTextToken;

        // }
        // to return Token After singup
        return $user->createToken('key')->plainTextToken;
    }
}
