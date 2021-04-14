@extends('dashboard.layouts.app', [
  'title' => __('Add Venue'),
  'parentSection' => 'helper',
  'elementName' => 'venue'
])

@section('pageTitle','Copa Tech - Add Venue')

@section('content')
  @component('dashboard.layouts.headers.auth')
    @component('dashboard.layouts.headers.breadcrumbs')
      <li class="breadcrumb-item"><a href="{{ route('lead.venue.index') }}">{{ __('Venue Management') }}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{ __('Add Venue') }}</li>
    @endcomponent
  @endcomponent

  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col-xl-12 order-xl-1">
        <div class="card">
          <div class="card-header">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="mb-0">{{ __('Venue Management') }}</h3>
              </div>
              <div class="col-4 text-right">
                <a href="{{ route('lead.venue.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('lead.venue.store') }}" autocomplete="off">
              @csrf

              <h6 class="heading-small text-muted mb-4">{{ __('Venue information') }}</h6>
              <div class="pl-lg-4">
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                  <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                  <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>

                  @include('alerts.feedback', ['field' => 'name'])
                </div>
                <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                  <label class="form-control-label" for="input-address">{{ __('Address') }}</label>
                  <input type="text" name="address" id="input-address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" placeholder="{{ __('Address') }}" value="{{ old('address') }}" required>

                  @include('alerts.feedback', ['field' => 'address'])
                </div>
                <div class="form-group{{ $errors->has('locality') ? ' has-danger' : '' }}">
                  <label class="form-control-label" for="input-locality">{{ __('Locality') }}</label>
                  <input type="text" name="locality" id="input-locality" class="form-control{{ $errors->has('locality') ? ' is-invalid' : '' }}" placeholder="{{ __('Locality') }}" value="{{ old('locality') }}" required>

                  @include('alerts.feedback', ['field' => 'locality'])
                </div>
                <div class="form-group{{ $errors->has('postal') ? ' has-danger' : '' }}">
                  <label class="form-control-label" for="input-postal">{{ __('Postal') }}</label>
                  <input type="text" name="postal" id="input-postal" class="form-control{{ $errors->has('postal') ? ' is-invalid' : '' }}" placeholder="{{ __('Postal') }}" value="{{ old('postal') }}" required>

                  @include('alerts.feedback', ['field' => 'postal'])
                </div>
                <div class="form-group{{ $errors->has('region') ? ' has-danger' : '' }}">
                  <label class="form-control-label" for="input-region">{{ __('Region') }}</label>
                  <input type="text" name="region" id="input-region" class="form-control{{ $errors->has('region') ? ' is-invalid' : '' }}" placeholder="{{ __('Region') }}" value="{{ old('region') }}" required>

                  @include('alerts.feedback', ['field' => 'region'])
                </div>
                <div class="form-group{{ $errors->has('country') ? ' has-danger' : '' }}">
                  <label class="form-control-label" for="input-country">{{ __('Country') }}</label>
                  <input type="text" name="country" id="input-country" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" placeholder="{{ __('Country') }}" value="{{ old('country') }}" required>

                  @include('alerts.feedback', ['field' => 'country'])
                </div>
                <div class="form-group{{ $errors->has('link') ? ' has-danger' : '' }}">
                  <label class="form-control-label" for="input-link">{{ __('Link') }}</label>
                  <input type="url" name="link" id="input-link" class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}" placeholder="{{ __('Link') }}" value="{{ old('link') }}" required>

                  @include('alerts.feedback', ['field' => 'link'])
                </div>
                <div class="form-group{{ $errors->has('map') ? ' has-danger' : '' }}">
                  <label class="form-control-label" for="input-map">{{ __('Map') }}</label>
                  <input type="url" name="map" id="input-map" class="form-control{{ $errors->has('map') ? ' is-invalid' : '' }}" placeholder="{{ __('Map') }}" value="{{ old('map') }}" required>

                  @include('alerts.feedback', ['field' => 'map'])
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
