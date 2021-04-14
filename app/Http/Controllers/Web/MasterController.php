<?php

namespace App\Http\Controllers\Web;

use App\Model\Team;
use App\Model\Story;
use App\Model\Project;
use App\Model\Workshop;
use App\Model\Learn\Track;
use App\Http\Controllers\Controller;

class MasterController extends Controller
{
  public function index()
  {
    $upcomings = Workshop::with('tags')->whereIn('status', ['ongoing', 'postponed'])->orderBy('start_date', 'asc')->take(3)->get();
    $pasts = Workshop::with('tags')->where('status', 'past')->orderByDesc('start_date')->get();
    $stories = Story::where('status', 'publish')->with('category')->orderByDesc('published_date')->take(3)->get();
    $teams = Team::with('user')->get();

    return view('web.welcome', compact(['upcomings','pasts','stories','teams']));
  }

  public function projects()
  {
    $aekitis = Project::with('tags')->where('show_on_homepage', 1)->where('category_id', 2)->orderByDesc('date')->get();
    $jaemers = Project::with('tags')->where('show_on_homepage', 1)->where('category_id', 3)->get();
    $others = Project::with('tags')->where('show_on_homepage', 1)->where('category_id', 4)->orderByDesc('date')->get();

    return view('web.projects', compact(['aekitis', 'jaemers', 'others']));
  }

  public function course()
  {
    $tracks = Track::with('tags')->get();

    return view('web.course', compact(['tracks']));
  }

  public function terms()
  {
    return view('web.terms');
  }

  public function privacy()
  {
    return view('web.privacy');
  }
}
