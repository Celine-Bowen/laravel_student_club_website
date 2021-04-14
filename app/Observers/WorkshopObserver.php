<?php

namespace App\Observers;

use App\Model\Workshop;
use Illuminate\Support\Facades\File;

class WorkshopObserver
{
  /**
   * Handle the Workshop "deleting" event.
   *
   * @param  \App\Model\Workshop  $workshop
   * @return void
   */
  public function deleting(Workshop  $workshop)
  {
    File::delete(storage_path("/app/public/{$workshop->picture}"));

    $workshop->tags()->detach();
  }

  /**
   * Handle the Workshop "updating" event.
   *
   * @param  \App\Model\Workshop  $workshop
   * @return void
   */
  public function updating(Workshop $workshop)
  {
    if ($workshop->picture != $workshop->getOriginal('picture')) {
      File::delete(storage_path("/app/public/{$workshop->getOriginal('picture')}"));
    }
  }
}
