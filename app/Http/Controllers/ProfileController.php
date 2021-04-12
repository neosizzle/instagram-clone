<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{

    //once this method is called, it will find the user in the parameter and return its view with that parameter
    public function index($user)
    {
        //find or fail returns a proper 404 view instead of throwing an error
        $user = User::findOrFail($user);

        //determine if the authed user is following the profile of the visited user
        $follows = auth()->user() ? auth()->user()->following->contains($user->id) : false;

    
 
        return view('profiles/index',['user' => $user , 'follows' => $follows]);
    }

    public function edit(\App\Models\User $user){
        return view('profiles/edit', ['user' => $user]);
    }

    public function update(){//note, only url params can be used as params in these functions

        //for forms, use request directly
        //request() object is like req obj in node THAT IS PASSED ON THROUGH FORMS
        //req.all is like req.body

        $data = request()->validate([
            'username' => 'required',
            'description' => 'required'
        ]);

        //get authed user
        $user = auth()->user();
        //update user with username field
        $user->update([
            "username" => $data['username']
        ]);

        //get authed users profile
        $profile = $user->profile;
        //update profile with desc field
        $profile->update([
            "description" => $data['description']
        ]);

        return redirect("/profile/".$user->id);


    }
}
