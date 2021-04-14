<?php

namespace App\Http\Controllers\Auth;

use App\Model\User;
use App\Mail\Web\Welcome;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class OAuthController extends Controller
{
  public function redirectToProvider($provider)
  {
    return Socialite::driver($provider)->redirect();
  }

  public function handleProviderCallback($provider)
  {
    $userSocial = Socialite::driver($provider)->user();

    $findUser = User::where('email', $userSocial->email)->first();

    if($findUser) {
      Auth::login($findUser);

      if($findUser->isLead()) {
        return redirect('/lead/dashboard');
      } else if($findUser->isMedia()) {
        return redirect('/media/dashboard');
         } else if($findUser->isCommunication()) {
        return redirect('/communication/dashboard');
      } else {
        return redirect('/dashboard');
      }
    }else {
      $user = User::create([
        'name' => $userSocial->name,
        'email' => $userSocial->email,
        'role_id' => 4,
        'password' => bcrypt($userSocial->token),
      ]);

      Mail::to($userSocial->email)->send(new Welcome($user));

      Auth::login($user);

      if($user->isLead()) {
        return redirect('/lead/dashboard');
      } else if($user->isMedia()) {
        return redirect('/media/dashboard');
        } else if($user->isCommunication()) {
        return redirect('/communication/dashboard');
      } else {
        return redirect('/dashboard');
      }
    }
  }
}
