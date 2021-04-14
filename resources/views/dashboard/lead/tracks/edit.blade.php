@extends('dashboard.layouts.app', [
  'title' => __('Track Management'),
  'parentSection' => 'site',
  'elementName' => 'track'
])

@section('pageTitle','Copa Tech - Edit Track')

@section('content')
  @component('dashboard.layouts.headers.auth')
    @component('dashboard.layouts.headers.breadcrumbs')
      <li class="breadcrumb-item"><a href="{{ route('lead.track.index') }}">{{ __('Track Management') }}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{ __('Edit Track') }}</li>
    @endcomponent
  @endcomponent

  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col-xl-12 order-xl-1">
        <div class="card">
          <div class="card-header">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="mb-0">{{ __('Track Management') }}</h3>
              </div>
              <div class="col-4 text-right">
                <a href="{{ route('lead.track.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form method="post" class="item-form" action="{{ route('lead.track.update', $track) }}" autocomplete="off" enctype="multipart/form-data">
              @csrf
              @method('put')

              <h6 class="heading-small text-muted mb-4">{{ __('Item information') }}</h6>
              <div class="pl-lg-4">
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                  <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                  <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', $track->name) }}" required autofocus>

                  @include('alerts.feedback', ['field' => 'name'])
                </div>
                <div class="form-group{{ $errors->has('source') ? ' has-danger' : '' }}">
                  <label class="form-control-label" for="input-source">{{ __('Source') }}</label>
                  <input type="text" name="source" id="input-source" class="form-control{{ $errors->has('source') ? ' is-invalid' : '' }}" placeholder="{{ __('Source') }}" value="{{ old('source', $track->source) }}" required>

                  @include('alerts.feedback', ['field' => 'source'])
                </div>
                <div class="form-group{{ $errors->has('link') ? ' has-danger' : '' }}">
                  <label class="form-control-label" for="input-link">{{ __('Link') }}</label>
                  <input type="url" name="link" id="input-link" class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}" placeholder="{{ __('Link') }}" value="{{ old('link', $track->link) }}" required>

                  @include('alerts.feedback', ['field' => 'link'])
                </div>
                <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                  <label class="form-control-label" for="input-description">{{ __('Description') }}</label>
                  <textarea name="description" id="input-description" cols="30" rows="2" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ __('Description') }}" value="{{ old('description') }}">{{ old('description', $track->description) }}</textarea>

                  @include('alerts.feedback', ['field' => 'description'])
                </div>
                <div class="form-group{{ $errors->has('photo') ? ' has-danger' : '' }}">
                  <label class="form-control-label" for="input-picture">{{ __('Picture') }}</label>
                  <div class="custom-file">
                    <input type="file" name="photo" class="custom-file-input{{ $errors->has('photo') ? ' is-invalid' : '' }}" id="input-picture" accept="image/*">
                    <label class="custom-file-label" for="input-picture">{{ __('Select picture') }}</label>
                  </div>

                  @include('alerts.feedback', ['field' => 'photo'])
                </div>
                <div class="form-group{{ $errors->has('tags') ? ' has-danger' : '' }}">
                  <label class="form-control-label" for="input-role">{{ __('Tags') }}</label>
                  <select name="tags[]" id="input-role" class="form-control select2{{ $errors->has('tags') ? ' is-invalid' : '' }}" placeholder="{{ __('Tags') }}" data-toggle="select" multiple>
                    @foreach ($tags as $tag)
                      <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', $track->tags->pluck('id')->toArray()) ?? []) ? 'selected' : '' }}>{{ $tag->name }}</option>
                    @endforeach
                  </select>

                  @include('alerts.feedback', ['field' => 'tags'])
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
@endpush

@push('js')
  <script src="{{ asset('assets/dashboard') }}/plugins/select2/dist/js/select2.min.js"></script>
  <script src="{{ asset('assets/dashboard/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

  <script type="text/javascript">
    $(document).ready(function () {
      bsCustomFileInput.init();
    });
  </script>
@endpush
