<?php

namespace App\Policies;

use App\Model\User;
use App\Model\Story;
use Illuminate\Auth\Access\HandlesAuthorization;

class StoryPolicy
{
  use HandlesAuthorization;

  /**
   * Determine whether the user can see the stories.
   *
   * @param  \App\Model\User  $user
   * @return boolean
   */
  public function viewAny(User $user)
  {
    return true;
  }

  /**
   * Determine whether the user can create stories.
   *
   * @param  \App\Model\User  $user
   * @return boolean
   */
  public function create(User $user)
  {
    return $user->isLead() || $user->isMedia() || $user->isCommunication();
  }

  /**
   * Determine whether the user can update the story.
   *
   * @param  \App\Model\User  $user
   * @param  \App\Model\Story  $story
   * @return boolean
   */
  public function update(User $user, Story $story)
  {
    return $user->isLead() || $user->isMedia() || $user->isCommunication();
  }

  /**
   * Determine whether the user can delete the story.
   *
   * @param  \App\Model\User  $user
   * @param  \App\Model\Story  $story
   * @return boolean
   */
  public function delete(User $user, Story $story)
  {
    return $user->isLead() || $user->isMedia() || $user->isCommunication();
  }
}
