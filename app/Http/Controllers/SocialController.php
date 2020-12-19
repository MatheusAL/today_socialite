<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Models\Team;
use Exception;


class SocialController extends Controller{


    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    
    public function handleProviderCallback($provider)
    {
        
        $providerUser = Socialite::driver($provider)->user();
        $user = User::firstOrCreate(['email' => $providerUser->getEmail()],[
            'name' => $providerUser->getName() ?? $providerUser->getNickname(),
            'email' => $providerUser->email,
            'social_id'=> $providerUser->id,
            'password' => encrypt('')
        ]);
        
        $newTeam = Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]);
        // save the team and add the team to the user.
        $newTeam->save();
        $user->current_team_id = $newTeam->id;
        $user->save();

        Auth::login($user);
        return redirect('/dashboard');

    }
}   