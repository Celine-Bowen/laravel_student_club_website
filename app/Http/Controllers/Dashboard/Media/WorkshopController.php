<?php

namespace App\Http\Controllers\Dashboard\Media;

use App\Model\Tag;
use App\Model\Workshop;
use App\Model\Venue;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\WorkshopRequest;

class WorkshopController extends Controller
{
  public function __construct()
  {
    $this->authorizeResource(Workshop::class);
  }

  /**
   * Display a listing of the workshops
   *
   * @param \App\Model\Workshop  $model
   * @return \Illuminate\View\View
   */
  public function index(Workshop $model)
  {
    return view('dashboard.media.workshops.index', ['workshops' => $model->with(['tags', 'venue'])->get()]);
  }

  /**
   * Show the form for creating a new workshop
   *
   * @param  \App\Model\Tag $tagModel
   * @param  \App\Model\Venue $venueModel
   * @return \Illuminate\View\View
   */
  public function create(Tag $tagModel, Venue $venueModel)
  {
    return view('dashboard.media.workshops.create', [
      'tags' => $tagModel->get(['id', 'name']),
      'venues' => $venueModel->get(['id', 'name'])
    ]);
  }

  /**
   * Store a newly created workshop in storage
   *
   * @param  \App\Http\Requests\WorkshopRequest  $request
   * @param  \App\Model\Workshop  $model
   * @return \Illuminate\Http\RedirectResponse
   */
  public function store(WorkshopRequest $request, Workshop $model)
  {
    $workshop = $model->create($request->merge([
      'slug' => Str::slug($request->title),
      'picture' => $request->image ? $request->image->store('workshops', 'public') : null
      ])->except([$request->hasFile('image') ? '' : 'picture']));

    $workshop->tags()->sync($request->get('tags'));

    return redirect()->route('media.workshop.index')->withStatus(__('Workshop successfully created.'));
  }

  /**
   * Show the form for editing the specified workshop
   *
   * @param  \App\Model\Workshop  $workshop
   * @param  \App\Model\Tag   $tagModel
   * @param  \App\Model\Venue $venueModel
   * @return \Illuminate\View\View
   */
  public function edit(Workshop $workshop, Tag $tagModel, Venue $venueModel)
  {
    return view('dashboard.media.workshops.edit', [
      'workshop' => $workshop->load('tags'),
      'tags' => $tagModel->get(['id', 'name']),
      'venues' => $venueModel->get(['id', 'name'])
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\WorkshopRequest  $request
   * @param  \App\Model\Workshop  $workshop
   * @return \Illuminate\Http\RedirectResponse
   */
  public function update(WorkshopRequest $request, Workshop $workshop)
  {
    $workshop->update(
      $request->merge([
        'slug' => Str::slug($request->title),
        'picture' => $request->image ? $request->image->store('workshops', 'public') : null
      ])->except([$request->hasFile('image') ? '' : 'picture']));

    $workshop->tags()->sync($request->get('tags'));

    return redirect()->route('media.workshop.index')->withStatus(__('Workshop successfully updated.'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Model\Workshop  $workshop
   * @return \Illuminate\Http\RedirectResponse
   */
  public function destroy(Workshop $workshop)
  {
    $workshop->delete();

    return redirect()->route('media.workshop.index')->withStatus(__('Workshop successfully deleted.'));
  }
}
