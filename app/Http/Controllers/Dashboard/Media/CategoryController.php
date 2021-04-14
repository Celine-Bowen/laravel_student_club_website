<?php

namespace App\Http\Controllers\Dashboard\Media;

use App\Model\Category;
use Illuminate\Support\Str;
use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
  public function __construct()
  {
    $this->authorizeResource(Category::class);
  }

  /**
   * Display a listing of the categories
   *
   * @param \App\Model\Category  $model
   * @return \Illuminate\View\View
   */
  public function index(Category $model)
  {
    return view('dashboard.media.categories.index', ['categories' => $model->all()]);
  }

  /**
   * Show the form for creating a new category
   *
   * @return \Illuminate\View\View
   */
  public function create()
  {
    return view('dashboard.media.categories.create');
  }

  /**
   * Store a newly created category in storage
   *
   * @param  \App\Http\Requests\CategoryRequest  $request
   * @param  \App\Model\Category  $model
   * @return \Illuminate\Http\RedirectResponse
   */
  public function store(CategoryRequest $request, Category $model)
  {
    $model->create($request->merge([
      'slug' => Str::slug($request->name)
    ])->all());

    return redirect()->route('media.category.index')->withStatus(__('Category successfully created.'));
  }

  /**
   * Show the form for editing the specified category
   *
   * @param  \App\Model\Category  $category
   * @return \Illuminate\View\View
   */
  public function edit(Category $category)
  {
    return view('dashboard.media.categories.edit', compact('category'));
  }

  /**
   * Update the specified category in storage
   *
   * @param  \App\Http\Requests\CategoryRequest  $request
   * @param  \App\Model\Category  $category
   * @return \Illuminate\Http\RedirectResponse
   */
  public function update(CategoryRequest $request, Category $category)
  {
    $category->update($request->merge([
      'slug' => Str::slug($request->name)
    ])->all());

    return redirect()->route('media.category.index')->withStatus(__('Category successfully updated.'));
  }

  /**
   * Remove the specified category from storage
   *
   * @param  \App\Model\Category  $category
   * @return \Illuminate\Http\RedirectResponse
   */
  public function destroy(Category $category)
  {
    if (!$category->stories->isEmpty()) {
      return redirect()->route('media.category.index')->withErrors(__('This category has stories attached and can\'t be deleted.'));
    }

    $category->delete();

    return redirect()->route('media.category.index')->withStatus(__('Category successfully deleted.'));
  }
}
