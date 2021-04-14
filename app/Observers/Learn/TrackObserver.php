<?php

namespace App\Observers\Learn;

use App\Model\Learn\Track;
use Illuminate\Support\Facades\File;

class TrackObserver
{
  /**
   * Handle the Track "deleting" event.
   *
   * @param  \App\Model\Learn\Track  $track
   * @return void
   */
  public function deleting(Track  $track)
  {
    File::delete(storage_path("/app/public/{$track->picture}"));

    $track->tags()->detach();
  }

  /**
   * Handle the Track "updating" event.
   *
   * @param  \App\Model\Track  $track
   * @return void
   */
  public function updating(Track $track)
  {
    if ($track->picture != $track->getOriginal('picture')) {
      File::delete(storage_path("/app/public/{$track->getOriginal('picture')}"));
    }
  }
}
