<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
  use Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name', 'email', 'password','provider', 'provider_id', 'picture' ,'role_id' ,'github_id' ,'google_id'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password', 'remember_token',
  ];

  /**
   * Get the role of the user
   *
   * @return \App\Role
   */
  public function role()
  {
    return $this->belongsTo(Role::class);
  }

  /**
   * Get the path to the profile picture
   *
   * @return string
   */
  public function profilePicture()
  {
    if ($this->picture) {
      return "/storage/{$this->picture}";
    }

    return "/assets/images/icons/icon-512x512.png";
  }

  /**
   * Check if the user has lead role
   *
   * @return boolean
   */
  public function isLead()
  {
    return $this->role_id == 1;
  }


  /**
   * Check if the user has Media role
   *
   * @return boolean
   */
  public function isMedia()
  {
    return $this->role_id == 2;
  }

  /**
   * Check if the user has Communication role
   *
   * @return boolean
   */
  public function isCommunication()
  {
      return $this->role_id == 3;
  }

  /**
   * Check if the user has user role
   *
   * @return boolean
   */
  public function isMember()
  {
      return $this->role_id == 4;
  }

  /**
   * Get the teams of the user
   *
   * @return \Illuminate\Database\Eloquent\Collection
   */
  public function teams()
  {
    return $this->hasMany(Team::class);
  }
}
