<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleSocialiteController extends Controller
{
    public function redirectToGoogle()
    {
        // redirect user to "login with Google account" page
        return Socialite::driver('google')->redirect();
    }

    public function handleCallback()
    {
        try {
            // get user data from Google
            $googleUser = Socialite::driver('google')->user();

            // if user not found then this is the first time he/she try to login with Google account
            // create user data with their Google account data
            // if use found then update it and then login
            $user = User::updateOrCreate([
                'social_id' => $googleUser->id
            ], [
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'social_id' => $googleUser->id,
                'social_type' => 'google',  // the social login is using google
                'password' => Hash::make('my-google'),  // fill password by whatever pattern you choose
                'avatar' => $googleUser->getAvatar(),
            ]);

            // login 
            // Auth::login($user);
            auth()->login($user);


            // retdirect home 
            return redirect()->to(route('home'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
