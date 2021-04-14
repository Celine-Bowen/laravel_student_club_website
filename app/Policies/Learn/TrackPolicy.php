<?php

namespace App\Policies\Learn;

use App\Model\User;
use App\Model\Learn\Track;
use Illuminate\Auth\Access\HandlesAuthorization;

class TrackPolicy
{
  use HandlesAuthorization;

  /**
   * Determine whether the user can see the tracks.
   *
   * @param  \App\Model\User  $user
   * @return boolean
   */
  public function viewAny(User $user)
  {
    return true;
  }

  /**
   * Determine whether the user can create tracks.
   *
   * @param  \App\Model\User  $user
   * @return boolean
   */
  public function create(User $user)
  {
    return $user->isLead();
  }

  /**
   * Determine whether the user can update the track.
   *
   * @param  \App\Model\User  $user
   * @param  \App\Model\Learn\Track  $track
   * @return boolean
   */
  public function update(User $user, Track $track)
  {
    return $user->isLead();
  }

  /**
   * Determine whether the user can delete the track.
   *
   * @param  \App\Model\User  $user
   * @param  \App\Model\Learn\Track  $track
   * @return boolean
   */
  public function delete(User $user, Track $track)
  {
    return $user->isLead();
  }
}