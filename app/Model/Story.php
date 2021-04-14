<?php

namespace App\Model;

use App\Model\Tag;
use App\Model\Category;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'title', 'slug', 'excerpt' , 'article', 'picture', 'category_id', 'status', 'published_date'
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
   * Get the category of the story
   *
   * @return \App\Model\Category
   */
  public function category()
  {
    return $this->belongsTo(Category::class);
  }

  /**
   * Get the tags of the story
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
