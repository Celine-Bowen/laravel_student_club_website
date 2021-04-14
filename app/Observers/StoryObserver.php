<?php

namespace App\Observers;

use App\Model\Story;
use Illuminate\Support\Facades\File;

class StoryObserver
{
  /**
   * Handle the Story "deleting" event.
   *
   * @param  \App\Model\Story  $story
   * @return void
   */
  public function deleting(Story  $story)
  {
    File::delete(storage_path("/app/public/{$story->picture}"));

    $story->tags()->detach();
  }

  /**
   * Handle the Story "updating" event.
   *
   * @param  \App\Model\Story  $story
   * @return void
   */
  public function updating(Story $story)
  {
    if ($story->picture != $story->getOriginal('picture')) {
      File::delete(storage_path("/app/public/{$story->getOriginal('picture')}"));
    }
  }
}
