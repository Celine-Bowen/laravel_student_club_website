<?php

namespace App\Http\Controllers\Web;

use App\Model\Story;
use Jorenvh\Share\ShareFacade;
use App\Http\Controllers\Controller;

class StoryController extends Controller
{
  public function index(Story $stories)
  {
    return view('web.stories.blog', ['stories' => $stories->where('status', 'publish')->with('tags')->orderByDesc('published_date')->paginate(3)]);
  }

  public function show(Story $story)
  {
    $stories = Story::where('status', 'publish')->with('category')->orderByDesc('published_date')->take(3)->get();
    $socialshare = ShareFacade::page(url()->current(), $story->title, [], '<div class="d-flex justify-content-around my-4" style="list-style:none">', '</div>')
      ->twitter()
      ->telegram()
      ->linkedin()
      ->whatsapp()
      ->facebook();

    return view('web.stories.story', compact(['story', 'stories', 'socialshare']));
  }
}
