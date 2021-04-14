<?php

namespace App\Model\Learn;

use App\Model\Tag;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name', 'picture', 'description', 'source', 'link'
  ];

  /**
   * Get the tags of the track
   *
   * @return \Illuminate\Database\Eloquent\Collection
   */
  public function tags()
  {
    return $this->belongsToMany(Tag::class);
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
