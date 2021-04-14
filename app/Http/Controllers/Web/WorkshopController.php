<?php

namespace App\Http\Controllers\Web;

use DateTime;
use App\Model\Workshop;
use Spatie\CalendarLinks\Link;
use Jorenvh\Share\ShareFacade;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class WorkshopController extends Controller
{
  public function show(Workshop $workshop)
  {
    $latest = Workshop::with(['tags','venue'])->orderByDesc('start_date')->first();

    $socialshare = ShareFacade::page(url()->current(), $workshop->title, [], '<div class="d-flex justify-content-around" style="list-style:none">', '</div>')
      ->twitter()
      ->telegram()
      ->linkedin()
      ->whatsapp()
      ->facebook();

    $startDate = Carbon::parse($workshop->start_date)->format('Y-m-d H:i');
    $endDate = Carbon::parse($workshop->end_date)->format('Y-m-d H:i');

    $from = DateTime::createFromFormat('Y-m-d H:i', $startDate);
    $to = DateTime::createFromFormat('Y-m-d H:i', $endDate);
    $calendar = Link::create($workshop->title, $from, $to)
    ->description($workshop->excerpt . ' Learn more at '. url()->current())
    ->address($workshop->venue->name . ': ' . $workshop->venue->link);

    return view('web.workshop', compact(['workshop','calendar','latest', 'socialshare']));
  }
}
