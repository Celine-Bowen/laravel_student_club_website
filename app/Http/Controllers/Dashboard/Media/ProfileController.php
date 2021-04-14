<?php

namespace App\Http\Controllers\Dashboard\Media;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
  /**
   * Show the form for editing the profile.
   *
   * @return \Illuminate\View\View
   */
  public function edit()
  {
    return view('dashboard.media.profile.edit');
  }

  /**
   * Update the profile
   *
   * @param  \App\Http\Requests\ProfileRequest  $request
   * @return \Illuminate\Http\RedirectResponse
   */
  public function update(ProfileRequest $request)
  {
    auth()->user()->update(
      $request->merge(['picture' => $request->photo ? $request->photo->store('profile', 'public') : null])
              ->except([$request->hasFile('photo') ? '' : 'picture'])
    );

    return back()->withStatus(__('Profile successfully updated.'));
  }

  /**
   * Change the password
   *
   * @param  \App\Http\Requests\PasswordRequest  $request
   * @return \Illuminate\Http\RedirectResponse
   */
  public function password(PasswordRequest $request)
  {
    auth()->user()->update(['password' => Hash::make($request->get('password'))]);

    return back()->withPasswordStatus(__('Password successfully updated.'));
  }
}
