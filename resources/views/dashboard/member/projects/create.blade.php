@extends('dashboard.layouts.app', [
  'title' => __('Project Management'),
  'parentSection' => 'site',
  'elementName' => 'project'
])

@section('pageTitle','Copa Tech - Add Project')

@section('content')
  @component('dashboard.layouts.headers.auth')
    @component('dashboard.layouts.headers.breadcrumbs')
      <li class="breadcrumb-item"><a href="{{ route('member.project.index') }}">{{ __('Project Management') }}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{ __('Add Project') }}</li>
    @endcomponent
  @endcomponent

  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col-xl-12 order-xl-1">
        <div class="card">
          <div class="card-header">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="mb-0">{{ __('Project Management') }}</h3>
              </div>
              <div class="col-4 text-right">
                <a href="{{ route('member.project.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form method="post" class="item-form" action="{{ route('member.project.store') }}" autocomplete="off" enctype="multipart/form-data">
              @csrf

              <h6 class="heading-small text-muted mb-4">{{ __('Item information') }}</h6>
              <div class="pl-lg-4">
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                  <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                  <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name') }}" autofocus>

                  @include('alerts.feedback', ['field' => 'name'])
                </div>
                <div class="form-group{{ $errors->has('category_id') ? ' has-danger' : '' }}">
                  <label class="form-control-label" for="input-role">{{ __('Category') }}</label>
                  <select name="category_id" id="input-role" class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}" placeholder="{{ __('Category') }}">
                    <option value="">-</option>
                    @foreach ($categories as $category)
                      <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                  </select>

                  @include('alerts.feedback', ['field' => 'category_id'])
                </div>
                <div class="form-group{{ $errors->has('link') ? ' has-danger' : '' }}">
                  <label class="form-control-label" for="input-link">{{ __('Link') }}</label>
                  <input type="url" name="link" id="input-link" class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}" placeholder="{{ __('Link') }}" value="{{ old('link') }}">

                  @include('alerts.feedback', ['field' => 'link'])
                </div>
                <div class="form-group{{ $errors->has('github') ? ' has-danger' : '' }}">
                  <label class="form-control-label" for="input-github">{{ __('Github') }}</label>
                  <input type="url" name="github" id="input-github" class="form-control{{ $errors->has('github') ? ' is-invalid' : '' }}" placeholder="{{ __('Github') }}" value="{{ old('github') }}">

                  @include('alerts.feedback', ['field' => 'github'])
                </div>
                <div class="form-group{{ $errors->has('youtube') ? ' has-danger' : '' }}">
                  <label class="form-control-label" for="input-youtube">{{ __('Youtube') }}</label>
                  <input type="url" name="youtube" id="input-youtube" class="form-control{{ $errors->has('youtube') ? ' is-invalid' : '' }}" placeholder="{{ __('Youtube') }}" value="{{ old('youtube') }}">

                  @include('alerts.feedback', ['field' => 'youtube'])
                </div>
                <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                  <label class="form-control-label" for="input-description">{{ __('Description') }}</label>
                  <textarea name="description" id="input-description" cols="30" rows="2" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ __('Description') }}" value="{{ old('description') }}">{{ old('description') }}</textarea>

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
                
                <div class="form-group">
                  <label class="form-control-label" for="input-role">{{ __('Show on homepage') }}</label>
                  <div class="custom-field">
                    <label class="custom-toggle">
                      <input name="show_on_homepage" type="checkbox" value="1" {{ old('show_on_homepage') == 1 ? ' checked' : '' }}>
                      <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                    </label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label" for="date">Date</label>
                      <input class="form-control datepicker" name="date" id="date" placeholder="Select date" type="text" data-date-format="dd-mm-yyyy" value="{{ old('date', now()->format('d-m-Y')) }}">
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
  <link rel="stylesheet" href="{{ asset('assets/dashboard') }}/plugins/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="{{ asset('assets/dashboard') }}/plugins/quill/dist/quill.core.css">
@endpush

@push('js')
  <script src="{{ asset('assets/dashboard') }}/plugins/select2/dist/js/select2.min.js"></script>
  <script src="{{ asset('assets/dashboard') }}/plugins/quill/dist/quill.min.js"></script>
  <script src="{{ asset('assets/dashboard') }}/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="{{ asset('assets/dashboard/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
  <script src="{{ asset('assets/dashboard') }}/js/items.js"></script>

  <script type="text/javascript">
    $(document).ready(function () {
      bsCustomFileInput.init();
    });
  </script>
@endpush
