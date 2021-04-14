<?php

namespace App\Policies;

use App\Model\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
  use HandlesAuthorization;

  /**
   * Determine whether the user can see the users.
   *
   * @param  \App\Model\User  $user
   * @return boolean
   */
  public function viewAny(User $user)
  {
    return $user->isLead();
  }

  /**
   * Determine whether the authenticate user can create users.
   *
   * @param  \App\Model\User $user
   * @return boolean
   */
  public function create(User $user)
  {
    return $user->isLead();
  }

  /**
   * Determine whether the authenticate user can update the user.
   *
   * @param  \App\Model\User  $user
   * @param  \App\Model\User  $model
   * @return boolean
   */
  public function update(User $user, User $model)
  {
    return $user->isLead();
  }

  /**
   * Determine whether the authenticate user can delete the user.
   *
   * @param  \App\Model\User  $user
   * @param  \App\Model\User  $model
   * @return boolean
   */
  public function delete(User $user, User $model)    {
    return $user->isLead() && $user->id != $model->id;
  }

  /**
   * Determine whether the authenticate user can manage other users.
   *
   * @param  \App\Model\User  $user
   * @return boolean
   */
  public function manageUsers(User $user)
  {
    return $user->isLead();
  }

  /**
   * Determine whether the authenticate user can manage stories and other related entities(tags, categories).
   *
   * @param  \App\Model\User  $user
   * @return boolean
   */
  public function manageStories(User $user)
  {
    return $user->isLead() || $user->isCommunication()  || $user->isMedia();
  }

  /**
   * Determine whether the authenticate user can manage projects and other related entities(tags, categories).
   *
   * @param  \App\Model\User  $user
   * @return boolean
   */
  public function manageProjects(User $user)
  {
    return $user->isLead() || $user->isMember();
  }

  /**
   * Determine whether the authenticate user can manage workshops and other related entities(tags).
   *
   * @param  \App\Model\User  $user
   * @return boolean
   */
  public function manageWorkshops(User $user)
  {
    return $user->isLead() || $user->isMember(); 
  }

  /**
   * Determine whether the authenticate user can manage tracks and other related entities(tags).
   *
   * @param  \App\Model\User  $user
   * @return boolean
   */
  public function manageTracks(User $user)
  {
    return $user->isLead()|| $user->isMember();;
  }

  /**
   * Determine whether the authenticate user can manage teams
   *
   * @param  \App\Model\User  $user
   * @return boolean
   */
  public function manageTeams(User $user)
  {
    return $user->isLead() || $user->isMember();
  }
}
