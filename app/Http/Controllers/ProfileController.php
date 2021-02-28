<?php

namespace App\Http\Controllers;

use App\Constantes\Constantes;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function updateViewProfile(Request $request){
        $user = \Auth::user();
        return view('profile', ['user' =>$user]);
    }

    public function updateProfile(Request $request){
        try{
            $user = \Auth::user();
            $user->email = $request->email;
            $user->name = $request->name;
            $user->update();
            return redirect('/service')
                ->with('mensagem', Constantes::SUCESSO_UPDATE_PERFIL);
        } catch (\Exception $exception){
            return redirect('/profile')
                ->with('mensagem', Constantes::ERROR_UPDATE_PERFIL);
        }

    }
}
