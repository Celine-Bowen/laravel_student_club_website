<?php

namespace App\Http\Controllers\Dashboard\Media;

use App\Model\Story;
use App\Model\User;
use App\Model\Project;
use App\Model\Workshop;
use App\Model\Learn\Track;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
  /**
   * Show the lead application dashboard.
   *
   * @return \Illuminate\View\View
   */
  public function dashboard()
  {
    $users = User::get();
    $workshops = Workshop::get();
    $projects = Project::get();
    $stories = Story::get();
    $tracks = Track::get();

    return view('dashboard.media.dashboard', compact(['users', 'workshops', 'tracks', 'stories']));
  }
}
