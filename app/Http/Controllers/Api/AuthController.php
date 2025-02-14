<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Auth;
use Hash;
use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{
    public function register(Request $request)
    {
    
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
    
        return response()->json([
            'token' => $user->createToken('mobile-app')->plainTextToken,
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
    return response()->json(['message' => 'Logged out']);

    }

    public function edit_user(Request $request)
    {
        $request->validate([
            'email'=> 'email',
            'password'=> 'string',
            'image' => 'image',
            'name' => 'string',
        ]);
        $user = $request->user();
        if($request->has('email')) $user->email = $request->email;
        if($request->has('password')) $user->password = $request->password;
        if($request->has('name')) $user->name = $request->name;
        if($request->has('image')) $user->image = $request->file('image')->store('public');

        return redirect('/starter')->with('success','profile edited successfully');
    }

}
