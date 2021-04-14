<?php

namespace App\Http\Controllers\Dashboard\Lead;

use App\Model\Story;
use App\Model\User;
use App\Model\Project;
use App\Model\Workshop;
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

    return view('dashboard.lead.dashboard', compact(['users', 'workshops', 'projects', 'stories']));
  }
}
