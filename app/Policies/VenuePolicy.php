<?php

namespace App\Policies;

use App\Model\User;
use App\Model\Venue;
use Illuminate\Auth\Access\HandlesAuthorization;

class VenuePolicy
{
  use HandlesAuthorization;

  /**
   * Determine whether the user can see the venues.
   *
   * @param  \App\Model\User  $user
   * @return boolean
   */
  public function viewAny(User $user)
  {
    return true;
  }

  /**
   * Determine whether the user can create venues.
   *
   * @param  \App\Model\User  $user
   * @return boolean
   */
  public function create(User $user)
  {
    return $user->isLead() || $user->isMedia() || $user->isCommunication();
  }

  /**
   * Determine whether the user can update the venue.
   *
   * @param  \App\Model\User  $user
   * @param  \App\Model\Venue  $venue
   * @return boolean
   */
  public function update(User $user, Venue $venue)
  {
    return $user->isLead() || $user->isMedia() || $user->isCommunication();
  }

  /**
   * Determine whether the user can delete the venue.
   *
   * @param  \App\Model\User  $user
   * @param  \App\Model\Venue  $venue
   * @return boolean
   */
  public function delete(User $user, Venue $venue)
  {
    return $user->isLead() || $user->isMedia() || $user->isCommunication();
  }
}
