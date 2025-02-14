<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate(
            [
                'email' => 'email|required',
                'name' => 'alpha|required',
                'password' => 'string|required',
            ]
        );
        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password),
        ]);
        $profile = new Profile;
        $profile->user_id = $user->id;
        $profile->save();
        Auth::login($user, true);
        return redirect()->route('dashboard')->with('success', true);
    }

    public function login(Request $request)
    {
        $request->validate(
            [
                'email' => 'email|required',
                'password' => 'string|required'
            ]
        );
        $user = User::where('email', $request->email)->first();
        if (Auth::attempt($request->only('email', 'password'), true)) {
            $request->session()->regenerate();
            return redirect()->intended('starter');
        }
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
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
