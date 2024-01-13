<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function redirectTG(Request $request) {
        return Socialite::driver('telegram')->redirect();
    }

    public function callbackTG(Request $request) {
        $tgUser = Socialite::driver('telegram')->user();
        $authUser = Auth::user();
        $user = User::where("tg_oauth_token", "=", $tgUser->id)->first();

        if(!is_null($authUser)) {
            if(is_null($user)) {
                $authUser->tg_oauth_token = $tgUser->id;
                $authUser->save();
            }
            $user = $authUser;
        }

        if(is_null($user)) {
            $user = new User();
            $user->nickname = $tgUser->nickname;
            $user->content = '';
            $user->avatar_preview_link = $tgUser->avatar;
            $user->voice_description = '';
            $user->tg_oauth_token = $tgUser->id;
            $user->approved = false;
            $user->save();
        } else {
            $user->avatar_preview_link = $tgUser->avatar;
            $user->save();
        }

        Auth::login($user);
        $token = auth()->user()->createToken('authToken');
        return $token->plainTextToken;
    }

    public function redirectVK(Request $request) {
        return Socialite::driver('vkontakte')->redirect();
    }

    public function callbackVK(Request $request) {
        $vkUser = Socialite::driver('vkontakte')->user();
        $authUser = Auth::user();
        $user = User::where("vk_oauth_token", "=", $vkUser->id)->first();

        if(!is_null($authUser)) {
            if(is_null($user)) {
                $authUser->vk_oauth_token = $vkUser->id;
                $authUser->save();
            }
            $user = $authUser;
        }

        if(is_null($user)) {
            $user = new User();
            $user->nickname = $vkUser->nickname;
            $user->content = '';
            $user->voice_description = '';
            $user->vk_oauth_token = $vkUser->id;
            $user->approved = false;
            $user->save();
        } else {
            $user->save();
        }

        Auth::login($user);
        $token = auth()->user()->createToken('authToken');
        return $token->plainTextToken;
    }

    public function logout(Request $request) {
        $user = Auth::user();
        auth()->user()->tokens()->delete();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function checkAuth(Request $request) {
        $user = Auth::user();
        return $user;
    }


}
