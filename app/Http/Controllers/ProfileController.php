<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function updateViewProfile(Request $request){
        $user = \Auth::user();
        return view('profile', ['user' =>$user]);
    }

    public function updateProfile(Request $request){
        $user = \Auth::user();
        $user->email = $request->email;
        $user->name = $request->name;
        $user->update();
        return redirect('/service');
    }
}
