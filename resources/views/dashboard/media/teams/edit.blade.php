@extends('dashboard.layouts.app', [
  'title' => __('Team Management'),
  'parentSection' => 'users',
  'elementName' => 'team'
])

@section('pageTitle','Copa Tech - Edit Team Member')

@section('content')
  @component('dashboard.layouts.headers.auth')
    @component('dashboard.layouts.headers.breadcrumbs')
      <li class="breadcrumb-item"><a href="{{ route('media.team.index') }}">{{ __('Team Management') }}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{ __('Edit Team Member') }}</li>
    @endcomponent
  @endcomponent

  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col-xl-12 order-xl-1">
        <div class="card">
          <div class="card-header">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="mb-0">{{ __('Team Management') }}</h3>
              </div>
              <div class="col-4 text-right">
                <a href="{{ route('media.team.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form method="post" class="item-form" action="{{ route('media.team.update', $team) }}" autocomplete="off">
              @csrf
              @method('put')

              <h6 class="heading-small text-muted mb-4">{{ __('Item information') }}</h6>
              <div class="pl-lg-4">
                <div class="form-group{{ $errors->has('user_id') ? ' has-danger' : '' }}">
                  <label class="form-control-label" for="select-user">{{ __('User') }}</label>
                  <select name="user_id" id="select-user" class="form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }}" placeholder="{{ __('User') }}" >
                    <option value="">-</option>
                    @foreach ($users as $user)
                      <option value="{{ $user->id }}" {{ $user->id == old('user_id', $team->user_id) ? 'selected' : '' }}>{{ $user->name }} - {{ $user->email }}</option>
                    @endforeach
                  </select>

                  @include('alerts.feedback', ['field' => 'user_id'])
                </div>
                <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                  <label class="form-control-label" for="input-title">{{ __('Title') }}</label>
                  <input type="text" name="title" id="input-title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('Title') }}" value="{{ old('title', $team->title) }}">
                  @include('alerts.feedback', ['field' => 'title'])
                </div>
                <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                  <label class="form-control-label" for="input-description">{{ __('Description') }}</label>
                  <textarea name="description" id="input-description" cols="30" rows="2" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ __('Description') }}" value="{{ old('description') }}">{{ old('description', $team->description) }}</textarea>

                  @include('alerts.feedback', ['field' => 'description'])
                </div>
                <div class="form-group{{ $errors->has('twitter') ? ' has-danger' : '' }}">
                  <label class="form-control-label" for="input-twitter">{{ __('Twitter') }}</label>
                  <input type="url" name="twitter" id="input-twitter" class="form-control{{ $errors->has('twitter') ? ' is-invalid' : '' }}" placeholder="{{ __('Twitter') }}" value="{{ old('twitter', $team->twitter) }}">
                  @include('alerts.feedback', ['field' => 'twitter'])
                </div>
                <div class="form-group{{ $errors->has('github') ? ' has-danger' : '' }}">
                  <label class="form-control-label" for="input-github">{{ __('Github') }}</label>
                  <input type="url" name="github" id="input-github" class="form-control{{ $errors->has('github') ? ' is-invalid' : '' }}" placeholder="{{ __('Github') }}" value="{{ old('github', $team->github) }}">
                  @include('alerts.feedback', ['field' => 'github'])
                </div>
                <div class="form-group{{ $errors->has('telegram') ? ' has-danger' : '' }}">
                  <label class="form-control-label" for="input-telegram">{{ __('Telegram') }}</label>
                  <input type="url" name="telegram" id="input-telegram" class="form-control{{ $errors->has('telegram') ? ' is-invalid' : '' }}" placeholder="{{ __('Telegram') }}" value="{{ old('telegram', $team->telegram) }}">
                  @include('alerts.feedback', ['field' => 'telegram'])
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    @include('dashboard.layouts.footers.auth')
  </div>
@endsection

@push('css')
  <link rel="stylesheet" href="{{ asset('assets/dashboard') }}/plugins/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="{{ asset('assets/dashboard') }}/plugins/quill/dist/quill.core.css">
@endpush

@push('js')
  <script src="{{ asset('assets/dashboard') }}/plugins/select2/dist/js/select2.min.js"></script>
  <script src="{{ asset('assets/dashboard') }}/plugins/quill/dist/quill.min.js"></script>
  <script src="{{ asset('assets/dashboard') }}/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="{{ asset('assets/dashboard') }}/js/items.js"></script>
@endpush
