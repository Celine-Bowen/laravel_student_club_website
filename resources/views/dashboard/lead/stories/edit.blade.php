@extends('dashboard.layouts.app', [
  'title' => __('Story Management'),
  'parentSection' => 'site',
  'elementName' => 'story'
])

@section('pageTitle','Copa Tech - Edit Story')

@section('content')
  @component('dashboard.layouts.headers.auth')
    @component('dashboard.layouts.headers.breadcrumbs')
      <li class="breadcrumb-item"><a href="{{ route('lead.story.index') }}">{{ __('Story Management') }}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{ __('Edit Story') }}</li>
    @endcomponent
  @endcomponent

  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col-xl-12 order-xl-1">
        <div class="card">
          <div class="card-header">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="mb-0">{{ __('Story Management') }}</h3>
              </div>
              <div class="col-4 text-right">
                <a href="{{ route('lead.story.show', $story) }}" class="btn btn-sm btn-secondary mr-2">{{ __('See Story') }}</a>
                <a href="{{ route('lead.story.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form method="post" class="item-form" action="{{ route('lead.story.update', $story) }}" autocomplete="off" enctype="multipart/form-data">
              @csrf
              @method('put')

              <h6 class="heading-small text-muted mb-4">{{ __('Item information') }}</h6>
              <div class="pl-lg-4">
                <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                  <label class="form-control-label" for="input-title">{{ __('Title') }}</label>
                  <input type="text" name="title" id="input-title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('Title') }}" value="{{ old('title', $story->title) }}"  autofocus>

                  @include('alerts.feedback', ['field' => 'title'])
                </div>
                <div class="form-group{{ $errors->has('slug') ? ' has-danger' : '' }}">
                  <label class="form-control-label" for="input-slug">{{ __('Slug') }}</label>
                  <input type="text" name="slug" id="input-slug" class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" placeholder="{{ __('Slug') }}" value="{{ old('slug', $story->slug) }}">

                  @include('alerts.feedback', ['field' => 'slug'])
                </div>
                <div class="form-group{{ $errors->has('category_id') ? ' has-danger' : '' }}">
                  <label class="form-control-label" for="input-role">{{ __('Category') }}</label>
                  <select name="category_id" id="input-role" class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}" placeholder="{{ __('Category') }}" >
                    <option value="">-</option>
                    @foreach ($categories as $category)
                      <option value="{{ $category->id }}" {{ $category->id == old('category_id', $story->category_id) ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                  </select>

                  @include('alerts.feedback', ['field' => 'category_id'])
                </div>
                <div class="form-group{{ $errors->has('excerpt') ? ' has-danger' : '' }}">
                  <label class="form-control-label" for="input-excerpt">{{ __('Excerpt') }}</label>
                  <textarea name="excerpt" id="input-excerpt" cols="30" rows="2" class="form-control{{ $errors->has('excerpt') ? ' is-invalid' : '' }}" placeholder="{{ __('Excerpt') }}" value="{{ old('excerpt') }}">{{ old('excerpt', $story->excerpt) }}</textarea>

                  @include('alerts.feedback', ['field' => 'excerpt'])
                </div>
                <div class="form-group{{ $errors->has('article') ? ' has-danger' : '' }}">
                  <label class="form-control-label" for="compose-textarea">{{ __('Article') }}</label>
                  <textarea name="article" id="compose-textarea" class="form-control{{ $errors->has('article') ? ' is-invalid' : '' }}">{{ old('article', $story->article) }}</textarea>
                  @include('alerts.feedback', ['field' => 'article'])
                </div>
                <div class="form-group{{ $errors->has('photo') ? ' has-danger' : '' }}">
                  <label class="form-control-label" for="pick-image">{{ __('Picture') }}</label>
                  <div class="custom-file">
                    <input type="file" name="photo" class="custom-file-input{{ $errors->has('photo') ? ' is-invalid' : '' }}" id="pick-image" accept="image/*">
                    <label class="custom-file-label" for="pick-image">{{ __('Select picture') }}</label>
                  </div>

                  @include('alerts.feedback', ['field' => 'photo'])
                </div>
                <div class="form-group{{ $errors->has('tags') ? ' has-danger' : '' }}">
                  <label class="form-control-label" for="input-role">{{ __('Tags') }}</label>
                  <select name="tags[]" id="input-role" class="form-control select2{{ $errors->has('tags') ? ' is-invalid' : '' }}" placeholder="{{ __('Tags') }}" data-toggle="select"  multiple>
                    @foreach ($tags as $tag)
                      <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', $story->tags->pluck('id')->toArray()) ?? []) ? 'selected' : '' }}>{{ $tag->name }}</option>
                    @endforeach
                  </select>

                  @include('alerts.feedback', ['field' => 'tags'])
                </div>
                <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
                  <label class="form-control-label" for="input-role">{{ __('Status') }}</label>
                  @foreach (config('aekiti.stories') as $value => $status)
                    <div class="custom-control custom-radio mb-3">
                      <input name="status" class="custom-control-input" id="{{ $value }}" value="{{ $value }}" type="radio" {{ old('status', $story->status) == $value ? ' checked=checked' : '' }} onclick="showDate('{{ $value }}')">
                      <label class="custom-control-label" for="{{ $value }}">{{ $status }}</label>
                    </div>
                  @endforeach

                  @include('alerts.feedback', ['field' => 'status'])
                </div>
                <div class="row" id="show_date">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label" for="published_date">Date</label>
                      <input class="form-control datepicker" name="published_date" id="published_date"  placeholder="Select published date" type="text" data-date-format="dd-mm-yyyy" value="{{ old('published_date', $story->published_date ? \Carbon\Carbon::parse($story->published_date)->format('d-m-Y') : '')}}">
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
  <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/summernote/summernote-bs4.css') }}">
@endpush

@push('js')
  <script src="{{ asset('assets/dashboard') }}/plugins/select2/dist/js/select2.min.js"></script>
  <script src="{{ asset('assets/dashboard/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
  <script src="{{ asset('assets/dashboard/plugins/summernote/summernote-bs4.min.js') }}"></script>
  <script src="{{ asset('assets/dashboard/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>

  <script type="text/javascript">
    $(document).ready(function () {
      bsCustomFileInput.init();
      document.getElementById('show_date').style.display = {{ $story->status === 'publish' ? 'block' : 'none' }};
    });
    $(function () {
      $('#compose-textarea').summernote()
    })

    function showDate(value){
      if(value === 'publish') {
        document.getElementById('show_date').style.display = 'block';
      } else {
        document.getElementById('show_date').style.display = 'none';
      }
      return;
    }
  </script>
@endpush
