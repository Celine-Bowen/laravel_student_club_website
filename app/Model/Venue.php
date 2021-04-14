<?php

namespace App\Model;

use App\Model\Workshop;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['name', 'address', 'locality', 'postal', 'region', 'country', 'link', 'map' ];

  /**
   * Get the workshops of the venue
   *
   * @return \Illuminate\Database\Eloquent\Collection
   */
  public function workshops()
  {
    return $this->hasMany(Workshop::class);
  }
}
