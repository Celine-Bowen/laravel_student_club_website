<?php

namespace App\Policies;

use App\Model\User;
use App\Model\Workshop;
use Illuminate\Auth\Access\HandlesAuthorization;

class WorkshopPolicy
{
  use HandlesAuthorization;

  /**
   * Determine whether the user can see the workshops.
   *
   * @param  \App\Model\User  $user
   * @return boolean
   */
  public function viewAny(User $user)
  {
    return true;
  }

  /**
   * Determine whether the user can create workshops.
   *
   * @param  \App\Model\User  $user
   * @return boolean
   */
  public function create(User $user)
  {
    return $user->isLead() || $user->isMedia();
  }

  /**
   * Determine whether the user can update the workshop.
   *
   * @param  \App\Model\User  $user
   * @param  \App\Model\Workshop  $workshop
   * @return boolean
   */
  public function update(User $user, Workshop $workshop)
  {
    return $user->isLead()  || $user->isMedia();
  }

  /**
   * Determine whether the user can delete the workshop.
   *
   * @param  \App\Model\User  $user
   * @param  \App\Model\Workshop  $workshop
   * @return boolean
   */
  public function delete(User $user, Workshop $workshop)
  {
    return $user->isLead()  || $user->isMedia();
  }
}
