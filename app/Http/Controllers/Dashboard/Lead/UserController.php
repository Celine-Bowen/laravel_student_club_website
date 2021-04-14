<?php

namespace App\Http\Controllers\Dashboard\Lead;

use App\Model\Role;
use App\Model\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
  public function __construct()
  {
    $this->authorizeResource(User::class);
  }

  /**
   * Display a listing of the users
   *
   * @param  \App\Model\User  $model
   * @return \Illuminate\View\View
   */
  public function index(User $model)
  {
    $this->authorize('manage-users', User::class);

    return view('dashboard.lead.users.index', ['users' => $model->with('role')->get()]);
  }

  /**
   * Show the form for creating a new user
   *
   * @param  \App\Model\Role  $model
   * @return \Illuminate\View\View
   */
  public function create(Role $model)
  {
    return view('dashboard.lead.users.create', ['roles' => $model->get(['id', 'name'])]);
  }

  /**
   * Store a newly created user in storage
   *
   * @param  \App\Http\Requests\UserRequest  $request
   * @param  \App\Model\User  $model
   * @return \Illuminate\Http\RedirectResponse
   */
  public function store(UserRequest $request, User $model)
  {
    $model->create($request->merge([
      'picture' => $request->photo ? $request->photo->store('profile', 'public') : null,
      'password' => Hash::make($request->get('password'))
    ])->all());

    return redirect()->route('lead.user.index')->withStatus(__('User successfully created.'));
  }

  /**
   * Show the form for editing the specified user
   *
   * @param  \App\Model\User  $user
   * @param  \App\Model\Role  $model
   * @return \Illuminate\View\View
   */
  public function edit(User $user, Role $model)
  {
    return view('dashboard.lead.users.edit', ['user' => $user->load('role'), 'roles' => $model->get(['id', 'name'])]);
  }

  /**
   * Update the specified user in storage
   *
   * @param  \App\Http\Requests\UserRequest  $request
   * @param  \App\Model\User  $user
   * @return \Illuminate\Http\RedirectResponse
   */
  public function update(UserRequest $request, User $user)
  {
    $hasPassword = $request->get("password");
    $user->update(
      $request->merge([
        'picture' => $request->photo ? $request->photo->store('profile', 'public') : $user->picture,
        'password' => Hash::make($request->get('password'))
      ])->except([$hasPassword ? '' : 'password'])
    );

    return redirect()->route('lead.user.index')->withStatus(__('User successfully updated.'));
  }

  /**
   * Remove the specified user from storage
   *
   * @param  \App\Model\User  $user
   * @return \Illuminate\Http\RedirectResponse
   */
  public function destroy(User $user)
  {
    $user->delete();

    return redirect()->route('lead.user.index')->withStatus(__('User successfully deleted.'));
  }
}
