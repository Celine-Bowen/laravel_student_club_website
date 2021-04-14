<?php

namespace App\Http\Controllers\Dashboard\Lead;

use App\Model\Tag;
use App\Model\Learn\Track;
use App\Http\Requests\Learn\TrackRequest;
use App\Http\Controllers\Controller;

class TrackController extends Controller
{
  public function __construct()
  {
    $this->authorizeResource(Track::class);
  }

  /**
   * Display a listing of the tracks
   *
   * @param \App\Model\Learn\Track  $model
   * @return \Illuminate\View\View
   */
  public function index(Track $model)
  {
    return view('dashboard.lead.tracks.index', ['tracks' => $model->with('tags')->get()]);
  }

  /**
   * Show the form for creating a new track
   *
   * @param  \App\Model\Tag $tagModel
   * @return \Illuminate\View\View
   */
  public function create(Tag $tagModel)
  {
    return view('dashboard.lead.tracks.create', ['tags' => $tagModel->get(['id', 'name'])]);
  }

  /**
   * Store a newly created track in storage
   *
   * @param  \App\Http\Requests\Learn\TrackRequest  $request
   * @param  \App\Model\Learn\Track  $model
   * @return \Illuminate\Http\RedirectResponse
   */
  public function store(TrackRequest $request, Track $model)
  {
    $track = $model->create($request->merge([
      'picture' => $request->photo ? $request->photo->store('tracks', 'public') : null
    ])->except([$request->hasFile('photo') ? '' : 'picture']));

    $track->tags()->sync($request->get('tags'));

    return redirect()->route('lead.track.index')->withStatus(__('Track successfully created.'));
  }

  /**
   * Show the form for editing the specified track
   *
   * @param  \App\Model\Learn\Track  $track
   * @param  \App\Model\Tag   $tagModel
   * @return \Illuminate\View\View
   */
  public function edit(Track $track, Tag $tagModel)
  {
    return view('dashboard.lead.tracks.edit', [
      'track' => $track->load('tags'),
      'tags' => $tagModel->get(['id', 'name'])
    ]);
  }

  /**
   * Update the specified track in storage.
   *
   * @param  \App\Http\Requests\Learn\TrackRequest  $request
   * @param  \App\Model\Learn\Track  $track
   * @return \Illuminate\Http\RedirectResponse
   */
  public function update(TrackRequest $request, Track $track)
  {
    $track->update(
      $request->merge([
        'picture' => $request->photo ? $request->photo->store('tracks', 'public') : null
      ])->except([$request->hasFile('photo') ? '' : 'picture'])
    );

    $track->tags()->sync($request->get('tags'));

    return redirect()->route('lead.track.index')->withStatus(__('Track successfully updated.'));
  }

  /**
   * Remove the specified track from storage.
   *
   * @param  \App\Model\Learn\Track  $track
   * @return \Illuminate\Http\RedirectResponse
   */
  public function destroy(Track $track)
  {
    $track->delete();

    return redirect()->route('lead.track.index')->withStatus(__('Track successfully deleted.'));
  }
}
