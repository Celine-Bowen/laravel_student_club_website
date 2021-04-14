@extends('dashboard.layouts.app', [
  'title' => __('Workshop Management'),
  'parentSection' => 'site',
  'elementName' => 'workshop'
])

@section('pageTitle','Copa Tech - Add Workshop')

@section('content')
  @component('dashboard.layouts.headers.auth')
    @component('dashboard.layouts.headers.breadcrumbs')
      <li class="breadcrumb-item"><a href="{{ route('media.workshop.index') }}">{{ __('Workshop Management') }}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{ __('Add Workshop') }}</li>
    @endcomponent
  @endcomponent

  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col-xl-12 order-xl-1">
        <div class="card">
          <div class="card-header">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="mb-0">{{ __('Workshop Management') }}</h3>
              </div>
              <div class="col-4 text-right">
                <a href="{{ route('media.workshop.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form method="post" class="item-form" action="{{ route('media.workshop.store') }}" autocomplete="off" enctype="multipart/form-data">
              @csrf

              <h6 class="heading-small text-muted mb-4">{{ __('Item information') }}</h6>
              <div class="pl-lg-4">
                <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                  <label class="form-control-label" for="input-title">{{ __('Title') }}</label>
                  <input type="text" name="title" id="input-title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('Title') }}" value="{{ old('title') }}"  autofocus>

                  @include('alerts.feedback', ['field' => 'title'])
                </div>
                <div class="form-group{{ $errors->has('venue_id') ? ' has-danger' : '' }}">
                  <label class="form-control-label" for="input-role">{{ __('Venue') }}</label>
                  <select name="venue_id" id="input-role" class="form-control{{ $errors->has('venue_id') ? ' is-invalid' : '' }}" >
                    <option value="">{{ __('Select Venue') }}</option>
                    @foreach ($venues as $venue)
                      <option value="{{ $venue->id }}" {{ $venue->id == old('venue_id') ? 'selected' : '' }}>{{ $venue->name }}</option>
                    @endforeach
                  </select>

                  @include('alerts.feedback', ['field' => 'venue_id'])
                </div>
                <div class="form-group{{ $errors->has('excerpt') ? ' has-danger' : '' }}">
                  <label class="form-control-label" for="input-excerpt">{{ __('Excerpt') }}</label>
                  <textarea name="excerpt" id="input-excerpt" cols="30" rows="2" class="form-control{{ $errors->has('excerpt') ? ' is-invalid' : '' }}" placeholder="{{ __('Excerpt') }}" value="{{ old('excerpt') }}">{{ old('excerpt') }}</textarea>

                  @include('alerts.feedback', ['field' => 'excerpt'])
                </div>
                <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                  <label class="form-control-label" for="compose-textarea">{{ __('Description') }}</label>
                  <textarea name="description" id="compose-textarea" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" style="height: 300px" {{ __('Description') }}>{{ old('description') }}</textarea>
                  @include('alerts.feedback', ['field' => 'description'])
                </div>
                <div class="form-group{{ $errors->has('image') ? ' has-danger' : '' }}">
                  <label class="form-control-label" for="pick-image">{{ __('Picture') }}</label>
                  <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input{{ $errors->has('image') ? ' is-invalid' : '' }}" id="pick-image" accept="image/*">
                    <label class="custom-file-label" for="pick-image">{{ __('Select picture') }}</label>
                  </div>

                  @include('alerts.feedback', ['field' => 'image'])
                </div>
                <div class="form-group{{ $errors->has('tags') ? ' has-danger' : '' }}">
                  <label class="form-control-label" for="input-tags">{{ __('Tags') }}</label>
                  <select name="tags[]" id="input-tags" class="form-control select2{{ $errors->has('tags') ? ' is-invalid' : '' }}" placeholder="{{ __('Tags') }}" data-toggle="select"  multiple>
                    @foreach ($tags as $tag)
                      <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags') ?? []) ? 'selected' : '' }}>{{ $tag->name }}</option>
                    @endforeach
                  </select>

                  @include('alerts.feedback', ['field' => 'tags'])
                </div>
                <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
                  <label class="form-control-label" for="input-status">{{ __('Status') }}</label>
                  <select name="status" id="input-status" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" >
                    <option value="">{{ __('Select Status') }}</option>
                    @foreach (config('aekiti.workshops.status') as $value => $status)
                      <option value="{{ $value }}" {{ $value == old('status') ? 'selected' : '' }}>{{ $status }}({{ $value }})</option>
                    @endforeach
                  </select>

                  @include('alerts.feedback', ['field' => 'status'])
                </div>
                <div class="form-group{{ $errors->has('mode') ? ' has-danger' : '' }}">
                  <label class="form-control-label" for="input-mode">{{ __('Mode') }}</label>
                  <select name="mode" id="input-mode" class="form-control{{ $errors->has('mode') ? ' is-invalid' : '' }}" placeholder="{{ __('Venue') }}" >
                    <option value="">{{ __('Select Mode') }}</option>
                    @foreach (config('aekiti.workshops.mode') as $value => $mode)
                      <option value="{{ $value }}" {{ $value == old('mode') ? 'selected' : '' }}>{{ $mode }}({{ $value }})</option>
                    @endforeach
                  </select>

                  @include('alerts.feedback', ['field' => 'mode'])
                </div>
                <div class="form-group{{ $errors->has('link') ? ' has-danger' : '' }}">
                  <label class="form-control-label" for="input-link">{{ __('Registration Link') }}</label>
                  <input type="url" name="link" id="input-link" class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}" placeholder="{{ __('Registration Link') }}" value="{{ old('link') }}">

                  @include('alerts.feedback', ['field' => 'link'])
                </div>
                <div class="form-group{{ $errors->has('youtube') ? ' has-danger' : '' }}">
                  <label class="form-control-label" for="input-youtube">{{ __('Youtube') }}</label>
                  <input type="url" name="youtube" id="input-youtube" class="form-control{{ $errors->has('youtube') ? ' is-invalid' : '' }}" placeholder="{{ __('Youtube') }}" value="{{ old('youtube') }}">

                  @include('alerts.feedback', ['field' => 'youtube'])
                </div>
                <div class="form-group{{ $errors->has('slide') ? ' has-danger' : '' }}">
                  <label class="form-control-label" for="input-slide">{{ __('Slide') }}</label>
                  <input type="url" name="slide" id="input-slide" class="form-control{{ $errors->has('slide') ? ' is-invalid' : '' }}" placeholder="{{ __('Slide') }}" value="{{ old('slide') }}">

                  @include('alerts.feedback', ['field' => 'slide'])
                </div>
                <div class="form-group{{ $errors->has('photo') ? ' has-danger' : '' }}">
                  <label class="form-control-label" for="input-photo">{{ __('Photo') }}</label>
                  <input type="url" name="photo" id="input-photo" class="form-control{{ $errors->has('photo') ? ' is-invalid' : '' }}" placeholder="{{ __('Photo') }}" value="{{ old('photo') }}">

                  @include('alerts.feedback', ['field' => 'photo'])
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label" for="start_date">Start Date</label>
                      <input class="form-control date" name="start_date" id="start_date" type="datetime"
                      value="{{ old('start_date')}}">

                      @include('alerts.feedback', ['field' => 'start_time'])
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label" for="end_date">End Date</label>
                      <input class="form-control date" name="end_date" id="end_date" type="datetime" value="{{ old('end_date')}}">

                      @include('alerts.feedback', ['field' => 'end_time'])
                    </div>
                  </div>
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
  <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/select2/dist/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/summernote/summernote-bs4.css') }}">
@endpush

@push('js')
  <script src="{{ asset('assets/dashboard/plugins/select2/dist/js/select2.min.js') }}"></script>
  <script src="{{ asset('assets/dashboard/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
  <script src="{{ asset('assets/dashboard/plugins/summernote/summernote-bs4.min.js') }}"></script>

  <script type="text/javascript">
    $(document).ready(function () {
      bsCustomFileInput.init();
    });
    $(function () {
      $('#compose-textarea').summernote()
    })
  </script>
@endpush
