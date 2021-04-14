<?php

namespace App\Model;

use App\Model\User;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'user_id', 'title', 'description', 'twitter', 'github', 'telegram'
  ];

  /**
   * Get the user of the team member
   *
   * @return \App\Model\User
   */
  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
