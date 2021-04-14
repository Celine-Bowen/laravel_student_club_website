<?php

namespace App\Policies;

use App\Model\User;
use App\Model\Project;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
  use HandlesAuthorization;

  /**
   * Determine whether the user can see the projects.
   *
   * @param  \App\Model\User  $user
   * @return boolean
   */
  public function viewAny(User $user)
  {
    return true;
  }

  /**
   * Determine whether the user can create projects.
   *
   * @param  \App\Model\User  $user
   * @return boolean
   */
  public function create(User $user)
  {
    return $user->isLead() || $user->isMember();
  }

  /**
   * Determine whether the user can update the project.
   *
   * @param  \App\Model\User  $user
   * @param  \App\Model\Project  $project
   * @return boolean
   */
  public function update(User $user, Project $project)
  {
    return $user->isLead();
  }

  /**
   * Determine whether the user can delete the project.
   *
   * @param  \App\Model\User  $user
   * @param  \App\Model\Project  $project
   * @return boolean
   */
  public function delete(User $user, Project $project)
  {
    return $user->isLead();
  }
}
