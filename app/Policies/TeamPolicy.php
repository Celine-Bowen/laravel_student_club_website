<?php

namespace App\Policies;

use App\Model\User;
use App\Model\Team;
use Illuminate\Auth\Access\HandlesAuthorization;

class TeamPolicy
{
  use HandlesAuthorization;

  /**
   * Determine whether the user can see the teams.
   *
   * @param  \App\Model\User  $user
   * @return boolean
   */
  public function viewAny(User $user)
  {
    return true;
  }

  /**
   * Determine whether the user can create teams.
   *
   * @param  \App\Model\User  $user
   * @return boolean
   */
  public function create(User $user)
  {
    return $user->isLead();
  }

  /**
   * Determine whether the user can update the team.
   *
   * @param  \App\Model\User  $user
   * @param  \App\Model\Team  $team
   * @return boolean
   */
  public function update(User $user, Team $team)
  {
    return $user->isLead();
  }

  /**
   * Determine whether the user can delete the team.
   *
   * @param  \App\Model\User  $user
   * @param  \App\Model\Team  $team
   * @return boolean
   */
  public function delete(User $user, Team $team)
  {
    return $user->isLead();
  }
}
