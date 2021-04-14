<?php

namespace App\Providers;

use App\Model\User;
use App\Model\Story;
use App\Model\Project;
use App\Model\Workshop;
use App\Model\Learn\Track;
use App\Observers\UserObserver;
use App\Observers\StoryObserver;
use App\Observers\ProjectObserver;
use App\Observers\WorkshopObserver;
use App\Observers\Learn\TrackObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {
    Workshop::observe(WorkshopObserver::class);
    Track::observe(TrackObserver::class);
    Project::observe(ProjectObserver::class);
    Story::observe(StoryObserver::class);
    User::observe(UserObserver::class);
    Schema::defaultStringLength(191);
  }

  /**
   * Register any application services.
   *
   * @return void
   */
  public function register()
  {
    //
  }
}
