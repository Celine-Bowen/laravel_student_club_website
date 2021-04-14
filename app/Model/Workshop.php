<?php

namespace App\Model;

use App\Model\Tag;
use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'title', 'slug', 'excerpt' , 'description', 'picture', 'venue_id', 'status', 'mode', 'start_date', 'end_date', 'link', 'youtube', 'slide', 'photo'
  ];

  /**
   * Get the route key for the model.
   *
   * @return string
   */
  public function getRouteKeyName()
  {
    return 'slug';
  }

  /**
   * Get the tags of the workshop
   *
   * @return \Illuminate\Database\Eloquent\Collection
   */
  public function tags()
  {
    return $this->belongsToMany(Tag::class);
  }

  /**
   * Get the venue of the workshop
   *
   * @return \App\Model\Venue
   */
  public function venue()
  {
    return $this->belongsTo(Venue::class);
  }

  /**
   * Get the path to the picture
   *
   * @return string
   */
  public function path()
  {
    return "/storage/{$this->picture}";
  }
}
