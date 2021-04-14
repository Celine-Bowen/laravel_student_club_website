<?php

namespace App\Policies;

use App\Model\User;
use App\Model\Category;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
  use HandlesAuthorization;

  /**
   * Determine whether the user can see the categories.
   *
   * @param  \App\Model\User  $user
   * @return boolean
   */
  public function viewAny(User $user)
  {
    return true;
  }

  /**
   * Determine whether the user can create categories.
   *
   * @param  \App\Model\User  $user
   * @return boolean
   */
  public function create(User $user)
  {
    return $user->isLead() || $user->isMedia() || $user->isCommunication();
  }

  /**
   * Determine whether the user can update the category.
   *
   * @param  \App\Model\User  $user
   * @param  \App\Model\Category  $category
   * @return boolean
   */
  public function update(User $user, Category $category)
  {
    return $user->isLead() || $user->isMedia() || $user->isCommunication();
  }

  /**
   * Determine whether the user can delete the category.
   *
   * @param  \App\Model\User  $user
   * @param  \App\Model\Category  $category
   * @return boolean
   */
  public function delete(User $user, Category $category)
  {
    return $user->isLead() || $user->isMedia() || $user->isCommunication();
  }
}
