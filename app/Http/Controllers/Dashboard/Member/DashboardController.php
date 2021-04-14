<?php

namespace App\Http\Controllers\Dashboard\Member;

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

    return view('dashboard.member.dashboard', compact(['users', 'workshops', 'tracks', 'stories']));
  }
}
