@extends('dashboard.layouts.app', [
  'title' => __('Story Management'),
  'parentSection' => 'site',
  'elementName' => 'story'
])

@section('pageTitle','Copa Tech - Edit Story')

@section('content')
  @component('dashboard.layouts.headers.auth')
    @component('dashboard.layouts.headers.breadcrumbs')
      <li class="breadcrumb-item"><a href="{{ route('communication.story.index') }}">{{ __('Story Management') }}</a></li>
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
                <a href="{{ route('communication.story.edit', $story) }}" class="btn btn-sm btn-secondary mr-2">{{ __('Edit Story') }}</a>
                <a href="{{ route('communication.story.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            @if ($story->path() !== "/storage/")
              <p class="text-center"><img class="img-fluid" src="{{ config('app.url') . $story->path() }}" alt="{{ $story->title }}"></p>
            @endif
            <div class="mt-4">
              <div>
                <h1 class="h1">{{ $story->title }} - <span class="text-primary" style="text-transform: initial">{{ $story->category->name }}</span></h1>
              </div>
              <div class="my-5">
                <blockquote class="storyquote mt-2"><p>{{ $story->excerpt }}</p></blockquote>
                <div>{!! $story->article !!}</div>
                <div class="d-flex justify-content-center mt-5">
                  @foreach ($story->tags as $tag)
                    <span class="badge badge-default mx-2" style="background-color:{{ $tag->color }}">{{ $tag->name }}</span>
                  @endforeach
                </div>
              </div>
            </div>
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
