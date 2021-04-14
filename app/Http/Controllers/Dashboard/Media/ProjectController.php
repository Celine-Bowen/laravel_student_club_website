<?php

namespace App\Http\Controllers\Dashboard\Media;

use Carbon\Carbon;
use App\Model\Tag;
use App\Model\Project;
use App\Model\Category;
use App\Http\Requests\ProjectRequest;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
  public function __construct()
  {
    $this->authorizeResource(Project::class);
  }

  /**
   * Display a listing of the projects
   *
   * @param \App\Model\Project  $model
   * @return \Illuminate\View\View
   */
  public function index(Project $model)
  {
    return view('dashboard.media.projects.index', ['projects' => $model->with(['tags', 'category'])->get()]);
  }

  /**
   * Show the form for creating a new project
   *
   * @param  \App\Model\Tag $tagModel
   * @param  \App\Model\Category $categoryModel
   * @return \Illuminate\View\View
   */
  public function create(Tag $tagModel, Category $categoryModel)
  {
    return view('dashboard.media.projects.create', [
      'tags' => $tagModel->get(['id', 'name']),
      'categories' => $categoryModel->get(['id', 'name'])
    ]);
  }

  /**
   * Store a newly created project in storage
   *
   * @param  \App\Http\Requests\ProjectRequest  $request
   * @param  \App\Model\Project  $model
   * @return \Illuminate\Http\RedirectResponse
   */
  public function store(ProjectRequest $request, Project $model)
  {
    $project = $model->create($request->merge([
      'picture' => $request->photo ? $request->photo->store('projects', 'public') : null,
      'show_on_homepage' => $request->show_on_homepage ? 1 : 0,
      'date' => $request->date ? Carbon::parse($request->date)->format('Y-m-d') : null
    ])->except([$request->hasFile('photo') ? '' : 'picture']));

    $project->tags()->sync($request->get('tags'));

    return redirect()->route('media.project.index')->withStatus(__('Project successfully created.'));
  }

  /**
   * Show the form for editing the specified project
   *
   * @param  \App\Model\Project  $project
   * @param  \App\Model\Tag   $tagModel
   * @param  \App\Model\Category $categoryModel
   * @return \Illuminate\View\View
   */
  public function edit(Project $project, Tag $tagModel, Category $categoryModel)
  {
    return view('dashboard.media.projects.edit', [
      'project' => $project->load('tags'),
      'tags' => $tagModel->get(['id', 'name']),
      'categories' => $categoryModel->get(['id', 'name'])
    ]);
  }

  /**
   * Update the specified project in storage.
   *
   * @param  \App\Http\Requests\ProjectRequest  $request
   * @param  \App\Model\Project  $project
   * @return \Illuminate\Http\RedirectResponse
   */
  public function update(ProjectRequest $request, Project $project)
  {
    $project->update(
      $request->merge([
        'picture' => $request->photo ? $request->photo->store('projects', 'public') : null,
        'show_on_homepage' => $request->show_on_homepage ? 1 : 0,
        'date' => $request->date ? Carbon::parse($request->date)->format('Y-m-d') : null
      ])->except([$request->hasFile('photo') ? '' : 'picture'])
    );

    $project->tags()->sync($request->get('tags'));

    return redirect()->route('media.project.index')->withStatus(__('Project successfully updated.'));
  }

  /**
   * Remove the specified project from storage.
   *
   * @param  \App\Model\Project  $project
   * @return \Illuminate\Http\RedirectResponse
   */
  public function destroy(Project $project)
  {
    $project->delete();

    return redirect()->route('media.project.index')->withStatus(__('Project successfully deleted.'));
  }
}
