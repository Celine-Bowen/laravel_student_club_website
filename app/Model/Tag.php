<?php

namespace App\Model;

use App\Model\Story;
use App\Model\Project;
use App\Model\Workshop;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['name', 'slug', 'color'];

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
   * Get the stories of the tag
   *
   * @return \Illuminate\Database\Eloquent\Collection
   */
  public function stories()
  {
    return $this->belongsToMany(Story::class);
  }

  /**
   * Get the projects of the tag
   *
   * @return \Illuminate\Database\Eloquent\Collection
   */
  public function projects()
  {
    return $this->belongsToMany(Project::class);
  }

  /**
   * Get the workshops of the tag
   *
   * @return \Illuminate\Database\Eloquent\Collection
   */
  public function workshops()
  {
    return $this->belongsToMany(Workshop::class);
  }
}
