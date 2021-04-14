<?php

namespace App\Providers;

use App\Model\Role;
use App\Model\User;
use App\Model\Tag;
use App\Model\Category;
use App\Model\Project;
// use App\Model\Story;
use App\Model\Team;
use App\Model\Venue;
use App\Model\Workshop;
use App\Model\Learn\Track;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use App\Policies\TagPolicy;
use App\Policies\TeamPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\ProjectPolicy;
// use App\Policies\StoryPolicy;
use App\Policies\VenuePolicy;
use App\Policies\WorkshopPolicy;
use App\Policies\Learn\TrackPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
  /**
   * The policy mappings for the application.
   *
   * @var array
   */
  protected $policies = [
    Role::class => RolePolicy::class,
    User::class => UserPolicy::class,
    Team::class => TeamPolicy::class,
    Tag::class => TagPolicy::class,
    Category::class => CategoryPolicy::class,
    Project::class => ProjectPolicy::class,
    // Story::class => StoryPolicy::class,
    Venue::class => VenuePolicy::class,
    Workshop::class => WorkshopPolicy::class,
    Track::class => TrackPolicy::class,
  ];

  /**
   * Register any authentication / authorization services.
   *
   * @return void
   */
  public function boot()
  {
    $this->registerPolicies();

    Gate::define('manage-workshops', 'App\Policies\UserPolicy@manageWorkshops');
    Gate::define('manage-tracks', 'App\Policies\UserPolicy@manageTracks');
    Gate::define('manage-projects', 'App\Policies\UserPolicy@manageProjects');
    // Gate::define('manage-stories', 'App\Policies\UserPolicy@manageStories');
    Gate::define('manage-users', 'App\Policies\UserPolicy@manageUsers');
    Gate::define('manage-teams', 'App\Policies\UserPolicy@manageTeams');
  }
}
