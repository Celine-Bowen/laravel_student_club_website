<?php

namespace App\Http\Controllers\Dashboard\Communication;

use App\Model\Venue;
use App\Http\Requests\VenueRequest;
use App\Http\Controllers\Controller;

class VenueController extends Controller
{
  public function __construct()
  {
    $this->authorizeResource(Venue::class);
  }

  /**
   * Display a listing of the venues
   *
   * @param \App\Model\Venue  $model
   * @return \Illuminate\View\View
   */
  public function index(Venue $model)
  {
    return view('dashboard.communication.venues.index', ['venues' => $model->all()]);
  }

  /**
   * Show the form for creating a new venue
   *
   * @return \Illuminate\View\View
   */
  public function create()
  {
    return view('dashboard.communication.venues.create');
  }

  /**
   * Store a newly created venue in storage
   *
   * @param  \App\Http\Requests\VenueRequest  $request
   * @param  \App\Model\Venue  $model
   * @return \Illuminate\Http\RedirectResponse
   */
  public function store(VenueRequest $request, Venue $model)
  {
    $model->create($request->all());

    return redirect()->route('communication.venue.index')->withStatus(__('Venue successfully created.'));
  }

  /**
   * Show the form for editing the specified venue
   *
   * @param  \App\Model\Venue  $venue
   * @return \Illuminate\View\View
   */
  public function edit(Venue $venue)
  {
    return view('dashboard.communication.venues.edit', compact('venue'));
  }

  /**
   * Update the specified venue in storage
   *
   * @param  \App\Http\Requests\VenueRequest  $request
   * @param  \App\Model\Venue  $venue
   * @return \Illuminate\Http\RedirectResponse
   */
  public function update(VenueRequest $request, Venue $venue)
  {
    $venue->update($request->all());

    return redirect()->route('communication.venue.index')->withStatus(__('Venue successfully updated.'));
  }

  /**
   * Remove the specified venue from storage
   *
   * @param  \App\Model\Venue  $venue
   * @return \Illuminate\Http\RedirectResponse
   */
  public function destroy(Venue $venue)
  {
    if (!$venue->workshops->isEmpty()) {
      return redirect()->route('communication.venue.index')->withErrors(__('This venue has workshops attached and can\'t be deleted.'));
    }

    $venue->delete();

    return redirect()->route('communication.venue.index')->withStatus(__('Venue successfully deleted.'));
  }
}
