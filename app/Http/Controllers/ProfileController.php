<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view("profile.index", compact("users"));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view("profile.show", compact("user"));
    }
    public function show_me(Request $request)
    {
        $user = $request->user();
        return view("profile.show", compact("user"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $user = $request->user();
        return view("profile.edit", compact("user"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'email'=> 'email',
            'password'=> 'string',
            'image' => 'image',
            'name' => 'string',
        ]);
        $user = $request->user();
        $profile = $user->profile;
        if($request->has('email')) $user->email = $request->email;
        if($request->has('password')) $user->password = $request->password;
        if($request->has('name')) $user->name = $request->name;
        if($request->has('image')) $profile->image = $request->file('image')->store('public');
        $user->save();

        return redirect(route('profile.show'))->with('success','profile edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
