<?php

namespace App\Http\Controllers\Dashboard\Member;

use App\Model\Tag;
use Illuminate\Support\Str;
use App\Http\Requests\TagRequest;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
  public function __construct()
  {
    $this->authorizeResource(Tag::class);
  }

  /**
   * Display a listing of the tags
   *
   * @param \App\Model\Tag  $model
   * @return \Illuminate\View\View
   */
  public function index(Tag $model)
  {
    return view('dashboard.member.tags.index', ['tags' => $model->all()]);
  }

  /**
   * Show the form for creating a new tag
   *
   * @return \Illuminate\View\View
   */
  public function create()
  {
    return view('dashboard.member.tags.create');
  }

  /**
   * Store a newly created tag in storage
   *
   * @param  \App\Http\Requests\TagRequest  $request
   * @param  \App\Model\Tag  $model
   * @return \Illuminate\Http\RedirectResponse
   */
  public function store(TagRequest $request, Tag $model)
  {
    $model->create($request->merge([
      'slug' => Str::slug($request->name)
    ])->all());

    return redirect()->route('member.tag.index')->withStatus(__('Tag successfully created.'));
  }

  /**
   * Show the form for editing the specified tag
   *
   * @param  \App\Model\Tag  $tag
   * @return \Illuminate\View\View
   */
  public function edit(Tag  $tag)
  {
    return view('dashboard.member.tags.edit', compact('tag'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\TagRequest  $request
   * @param  \App\Model\Tag  $tag
   * @return \Illuminate\Http\RedirectResponse
   */
  public function update(TagRequest $request, Tag $tag)
  {
    $tag->update($request->merge([
      'slug' => Str::slug($request->name)
    ])->all());

    return redirect()->route('member.tag.index')->withStatus(__('Tag successfully updated.'));
  }

  /**
   * Remove the specified tag from storage
   *
   * @param  \App\Model\Tag  $tag
   * @return \Illuminate\Http\RedirectResponse
   */
  public function destroy(Tag $tag)
  {
    if (!$tag->stories->isEmpty()) {
      return redirect()->route('member.tag.index')->withErrors(__('This tag has stories attached and can\'t be deleted.'));
    }

    $tag->delete();

    return redirect()->route('member.tag.index')->withStatus(__('Tag successfully deleted.'));
  }
}
