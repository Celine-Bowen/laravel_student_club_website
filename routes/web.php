<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Spatie\Sitemap\SitemapGenerator;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Web Routes
Route::group(['namespace' => 'Web','middleware' => 'web'], function () {
  Route::get('/', 'MasterController@index')->name('index');
  Route::get('workshop/{workshop}', 'WorkshopController@show')->name('workshop.show');
  Route::get('projects', 'MasterController@projects')->name('projects');
  Route::get('course', 'MasterController@course')->name('course');
  Route::get('terms', 'MasterController@terms')->name('terms');
  Route::get('privacy', 'MasterController@privacy')->name('privacy');
  // Story
  Route::group(['prefix' => 'stories', 'as' => 'stories.'], function () {
    Route::get('/', 'StoryController@index')->name('index');
    Route::get('/{story}', 'StoryController@show')->name('show');
  });

  Route::get('sitemap', function () {
    SitemapGenerator::create(config('app.url'))->writeToFile('sitemap.xml');

    return view('web.sitemap');
  });
});

// Authentication Routes
Auth::routes(['verify' => true]);
// Google login
Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');

// Facebook login
Route::get('login/facebook', [App\Http\Controllers\Auth\LoginController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('login/facebook/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleFacebookCallback']);

// Github login
Route::get('auth/github', 'Auth\GithubController@redirectToGithub');
    Route::get('auth/github/callback', 'Auth\GithubController@handleGithubCallback');

// Dashboard Routes
Route::group(['namespace' => 'Dashboard', 'middleware' => ['auth', 'verified']], function () {
  // Lead Routes
  Route::group(['namespace' => 'Lead', 'prefix' => 'lead', 'as' => 'lead.', 'middleware' => 'lead'], function () {
    // Dashboard
    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');
    // Profile
    Route::get('profile', 'ProfileController@edit')->name('profile.edit');
    Route::put('profile', 'ProfileController@update')->name('profile.update');
    Route::put('profile/password', 'ProfileController@password')->name('profile.password');
    // Users
    Route::resource('role', 'RoleController');
    Route::resource('user', 'UserController');
    Route::resource('team', 'TeamController');
    // Helpers
    Route::resource('tag', 'TagController');
    Route::resource('category', 'CategoryController');
    Route::resource('venue', 'VenueController');
    // Site
    Route::resource('track', 'TrackController');
    Route::resource('project', 'ProjectController');
    Route::resource('workshop', 'WorkshopController');
    Route::resource('story', 'StoryController');
  });
  // Media Routes
  Route::group(['namespace' => 'Media', 'prefix' => 'media', 'as' => 'media.', 'middleware' => 'media'], function () {
    // Dashboard
    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');
    // Profile
    Route::get('profile', 'ProfileController@edit')->name('profile.edit');
    Route::put('profile', 'ProfileController@update')->name('profile.update');
    Route::put('profile/password', 'ProfileController@password')->name('profile.password');
      // Users
    Route::resource('role', 'RoleController');
    Route::resource('user', 'UserController');
    Route::resource('team', 'TeamController');
    // Helpers
    Route::resource('tag', 'TagController');
    Route::resource('category', 'CategoryController');
    Route::resource('venue', 'VenueController');
    // Site
    Route::resource('track', 'TrackController');
    Route::resource('project', 'ProjectController');
    Route::resource('workshop', 'WorkshopController');
    Route::resource('story', 'StoryController');
  });
  // communication Routes
  Route::group(['namespace' => 'Communication', 'prefix' => 'communication', 'as' => 'communication.', 'middleware' => 'communication'], function () {
    // Dashboard
    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');
    // Profile
    Route::get('profile', 'ProfileController@edit')->name('profile.edit');
    Route::put('profile', 'ProfileController@update')->name('profile.update');
    Route::put('profile/password', 'ProfileController@password')->name('profile.password');

      // Users
    Route::resource('role', 'RoleController');
    Route::resource('user', 'UserController');
    Route::resource('team', 'TeamController');
    // Helpers
    Route::resource('tag', 'TagController');
    Route::resource('category', 'CategoryController');
    Route::resource('venue', 'VenueController');
    // Site
    Route::resource('track', 'TrackController');
    Route::resource('project', 'ProjectController');
    Route::resource('workshop', 'WorkshopController');
    Route::resource('story', 'StoryController');
  });
  // Member Routes
  Route::group(['namespace' => 'Member', 'as' => 'member.', 'middleware' => 'member'], function () {
    // Dashboard
    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');
    // Profile
    Route::get('profile', 'ProfileController@edit')->name('profile.edit');
    Route::put('profile', 'ProfileController@update')->name('profile.update');
    Route::put('profile/password', 'ProfileController@password')->name('profile.password');
  
    // Site
    Route::resource('track', 'TrackController');
    Route::resource('project', 'ProjectController');
    
    

    
  });
});