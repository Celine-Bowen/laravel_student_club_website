@extends('dashboard.layouts.app', [
  'title' => __('Add Tag'),
  'parentSection' => 'helper',
  'elementName' => 'tag'
])

@section('pageTitle','Copa Tech - Add Tag')

@section('content')
  @component('dashboard.layouts.headers.auth')
    @component('dashboard.layouts.headers.breadcrumbs')
      <li class="breadcrumb-item"><a href="{{ route('communication.tag.index') }}">{{ __('Tag Management') }}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{ __('Add Tag') }}</li>
    @endcomponent
  @endcomponent

  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col-xl-12 order-xl-1">
        <div class="card">
          <div class="card-header">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="mb-0">{{ __('Add Tag') }}</h3>
              </div>
              <div class="col-4 text-right">
                <a href="{{ route('communication.tag.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('communication.tag.store') }}" autocomplete="off">
              @csrf

              <h6 class="heading-small text-muted mb-4">{{ __('Tag information') }}</h6>
              <div class="pl-lg-4">
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                  <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                  <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>

                  @include('alerts.feedback', ['field' => 'name'])
                </div>
                <div class="form-group{{ $errors->has('color') ? ' has-danger' : '' }}">
                  <label class="form-control-label" for="input-name">{{ __('Color') }}</label>
                  <input type="color" name="color" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Color') }}" value="{{ old('color') }}" required>

                  @include('alerts.feedback', ['field' => 'color'])
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
