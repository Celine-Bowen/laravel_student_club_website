<?php

namespace App\Http\Controllers\Dashboard\Lead;

use Carbon\Carbon;
use App\Model\Tag;
use App\Model\Story;
use App\Model\Category;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoryRequest;

class StoryController extends Controller
{
  // public function __construct()
  // {
  //   $this->authorizeResource(Story::class);
  // }

  /**
   * Display a listing of the stories
   *
   * @param \App\Model\Story  $model
   * @return \Illuminate\View\View
   */
  public function index(Story $model)
  {
    return view('dashboard.lead.stories.index', ['stories' => $model->with(['tags', 'category'])->get()]);
  }

  /**
   * Show the form for creating a new story
   *
   * @param  \App\Model\Tag $tagModel
   * @param  \App\Model\Category $categoryModel
   * @return \Illuminate\View\View
   */
  public function create(Tag $tagModel, Category $categoryModel)
  {
    return view('dashboard.lead.stories.create', [
      'tags' => $tagModel->get(['id', 'name']),
      'categories' => $categoryModel->get(['id', 'name'])
    ]);
  }

  /**
   * Store a newly created story in storage
   *
   * @param  \App\Http\Requests\StoryRequest  $request
   * @param  \App\Model\Story  $model
   * @return \Illuminate\Http\RedirectResponse
   */
  public function store(StoryRequest $request, Story $model)
  {
    $story = $model->create($request->merge([
      'slug' => $request->slug ? Str::slug($request->slug) : null,
      'picture' => $request->photo ? $request->photo->store('stories', 'public') : null,
      'published_date' => $request->published_date ? Carbon::parse($request->published_date)->format('Y-m-d') : null
    ])->except([$request->hasFile('photo') ? '' : 'picture']));

    $story->tags()->sync($request->get('tags'));

    return redirect()->route('lead.story.index')->withStatus(__('Story successfully created.'));
  }

  /**
   * Display a specific story
   *
   * @param \App\Model\Story $story
   * @return \Illuminate\View\View
   */
  public function show(Story $story,  Tag $tagModel, Category $categoryModel)
  {
    return view('dashboard.lead.stories.show', [
      'story' => $story->load('tags'),
      'tags' => $tagModel->get(['id', 'name']),
      'categories' => $categoryModel->get(['id', 'name'])
    ]);
  }

  /**
   * Show the form for editing the specified story
   *
   * @param  \App\Model\Story  $story
   * @param  \App\Model\Tag   $tagModel
   * @param  \App\Model\Category $categoryModel
   * @return \Illuminate\View\View
   */
  public function edit(Story $story, Tag $tagModel, Category $categoryModel)
  {
    return view('dashboard.lead.stories.edit', [
      'story' => $story->load('tags'),
      'tags' => $tagModel->get(['id', 'name']),
      'categories' => $categoryModel->get(['id', 'name'])
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\StoryRequest  $request
   * @param  \App\Model\Story  $story
   * @return \Illuminate\Http\RedirectResponse
   */
  public function update(StoryRequest $request, Story $story)
  {
    $story->update(
      $request->merge([
        'slug' => $request->slug ? Str::slug($request->slug) : null,
        'picture' => $request->photo ? $request->photo->store('stories', 'public') : null,
        'published_date' => $request->published_date ? Carbon::parse($request->published_date)->format('Y-m-d') : null
      ])->except([$request->hasFile('photo') ? '' : 'picture']));

    $story->tags()->sync($request->get('tags'));

    return redirect()->route('lead.story.index')->withStatus(__('Story successfully updated.'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Model\Story  $story
   * @return \Illuminate\Http\RedirectResponse
   */
  public function destroy(Story $story)
  {
    $story->delete();

    return redirect()->route('lead.story.index')->withStatus(__('Story successfully deleted.'));
  }
}
