<?php

namespace App\Http\Controllers\Dashboard\Media;

use App\Model\Team;
use App\Model\User;
use App\Http\Requests\TeamRequest;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
  public function __construct()
  {
    $this->authorizeResource(Team::class);
  }

  /**
   * Display a listing of the teams
   *
   * @param \App\Model\Team  $model
   * @return \Illuminate\View\View
   */
  public function index(Team $model)
  {
    return view('dashboard.media.teams.index', ['teams' => $model->with('user')->get()]);
  }

  /**
   * Show the form for creating a new team
   * @param  \App\Model\User $userModel
   * @return \Illuminate\View\View
   */
  public function create(User $userModel)
  {
    return view('dashboard.media.teams.create', ['users' => $userModel->get(['id', 'name', 'email'])]);
  }

  /**
   * Store a newly created team in storage
   *
   * @param  \App\Http\Requests\TeamRequest  $request
   * @param  \App\Model\Team  $model
   * @return \Illuminate\Http\RedirectResponse
   */
  public function store(TeamRequest $request, Team $model)
  {
    $model->create($request->all());

    return redirect()->route('media.team.index')->withStatus(__('Team member successfully created.'));
  }

  /**
   * Show the form for editing the specified team member
   *
   * @param  \App\Model\Team  $team
   * @param  \App\Model\User $userModel
   * @return \Illuminate\View\View
   */
  public function edit(Team $team, User $userModel)
  {
    return view('dashboard.media.teams.edit', [
      'users' => $userModel->get(['id', 'name', 'email']),
      'team' => $team
    ]);
  }

  /**
   * Update the specified team member in storage.
   *
   * @param  \App\Http\Requests\TeamRequest  $request
   * @param  \App\Model\Team  $team
   * @return \Illuminate\Http\RedirectResponse
   */
  public function update(TeamRequest $request, Team $team)
  {
    $team->update($request->all());

    return redirect()->route('media.team.index')->withStatus(__('Team member successfully updated.'));
  }

  /**
   * Remove the specified team member from storage.
   *
   * @param  \App\Model\Team  $team
   * @return \Illuminate\Http\RedirectResponse
   */
  public function destroy(Team $team)
  {
    $team->delete();

    return redirect()->route('media.team.index')->withStatus(__('Team member successfully deleted.'));
  }
}
