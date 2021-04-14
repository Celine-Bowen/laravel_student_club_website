<?php

namespace App\Http\Controllers\Dashboard\Member;

use App\Model\Role;
use App\Model\User;
use App\Http\Requests\RoleRequest;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
  public function __construct()
  {
    $this->authorizeResource(Role::class);
  }

  /**
   * Display a listing of the roles
   *
   * @param \App\Model\Role  $model
   * @return \Illuminate\View\View
   */
  public function index(Role $model)
  {
    $this->authorize('manage-users', User::class);

    return view('dashboard.member.roles.index', ['roles' => $model->all()]);
  }

  /**
   * Show the form for creating a new role
   *
   * @return \Illuminate\View\View
   */
  public function create()
  {
    return view('dashboard.member.roles.create');
  }

  /**
   * Store a newly created role in storage
   *
   * @param  \App\Http\Requests\RoleRequest  $request
   * @param  \App\Model\Role  $model
   * @return \Illuminate\Http\RedirectResponse
   */
  public function store(RoleRequest $request, Role $model)
  {
    $model->create($request->all());

    return redirect()->route('member.role.index')->withStatus(__('Role successfully created.'));
  }

  /**
   * Show the form for editing the specified role
   *
   * @param  \App\Model\Role  $role
   * @return \Illuminate\View\View
   */
  public function edit(Role $role)
  {
    return view('dashboard.member.roles.edit', compact('role'));
  }

  /**
   * Update the specified role in storage
   *
   * @param  \App\Http\Requests\RoleRequest  $request
   * @param  \App\Model\Role  $role
   * @return \Illuminate\Http\RedirectResponse
   */
  public function update(RoleRequest $request, Role $role)
  {
    $role->update($request->all());

    return redirect()->route('member.role.index')->withStatus(__('Role successfully updated.'));
  }
}
