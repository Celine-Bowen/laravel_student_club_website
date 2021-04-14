<?php

namespace App\Model;

use App\Model\Tag;
use App\Model\Category;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name', 'description', 'picture', 'category_id', 'date', 'show_on_homepage', 'link', 'github', 'youtube'
  ];

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
