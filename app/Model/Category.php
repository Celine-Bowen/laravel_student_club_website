<?php

namespace App\Model;

use App\Model\Story;
use App\Model\Project;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['name', 'slug', 'description'];

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
   * Get the stories of the category
   *
   * @return \Illuminate\Database\Eloquent\Collection
   */
  public function stories()
  {
    return $this->hasMany(Story::class);
  }

  /**
   * Get the stories of the project
   *
   * @return \Illuminate\Database\Eloquent\Collection
   */
  public function projects()
  {
    return $this->hasMany(Project::class);
  }
}
