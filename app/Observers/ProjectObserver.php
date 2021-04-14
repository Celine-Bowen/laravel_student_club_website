<?php

namespace App\Observers;

use App\Model\Project;
use Illuminate\Support\Facades\File;

class ProjectObserver
{
  /**
   * Handle the Project "deleting" event.
   *
   * @param  \App\Model\Project  $project
   * @return void
   */
  public function deleting(Project  $project)
  {
    File::delete(storage_path("/app/public/{$project->picture}"));

    $project->tags()->detach();
  }

  /**
   * Handle the Project "updating" event.
   *
   * @param  \App\Model\Project  $project
   * @return void
   */
  public function updating(Project $project)
  {
    if ($project->picture != $project->getOriginal('picture')) {
      File::delete(storage_path("/app/public/{$project->getOriginal('picture')}"));
    }
  }
}
