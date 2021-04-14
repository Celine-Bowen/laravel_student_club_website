@extends('web.layouts.app')

@section('pageTitle')
  {{ config('app.nick') }} stories: {{ $story->title }}
@endsection
@section('pageDescription')
  {{ $story->excerpt }}
@endsection
@section('pageImage')
  {{ $story->path() !== '/storage/' ? config('app.url') . $story->path() :  config('app.url').'/assets/images/icons/icon-512x512.png' }}
@endsection

@section('css')
<script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Article",
    "mainEntityOfPage": {
      "@type": "WebPage",
      "@id": "{{ url()->current() }}"
    },
    "headline": "{{ $story->title }}",
    "articleSection": "{{ $story->category->name }}",
    "keywords": "@foreach ($story->tags as $tag){{ $tag->name }}, @endforeach",
    "description": "{{ $story->excerpt }}",
    "sameAs": "{{ url()->current() }}",
    "image": "{{ $story->path() !== '/storage/' ? config('app.url') . $story->path() :  config('app.url').'/assets/images/icons/icon-512x512.png' }}",
    "dateCreated": "{{ $story->created_at->format('c') }}",
    "datePublished": "{{ Carbon\Carbon::parse($story->published_date)->format('c') }}",
    "dateModified": "{{ $story->updated_at->format('c') }}",
    "author": {
      "@type": "Organization",
      "name": "{{ config('app.name') }}"
    },
     "publisher": {
      "@type": "Organization",
      "name": "{{ config('app.name') }}",
      "alternateName": "{{ config('app.nick') }}",
      "logo": {
        "@type": "ImageObject",
        "text": "{{ config('app.nick') }}",
        "url": "http://cuktech.onlineacademicexperts.com/assets/images/icons/icon-512x512.png"
      }
    }
  }
  </script>

  <style>
    .storyquote {
      background: #fff;
      border-left: 3px solid #f3256a;
      margin: 1.5em 10px;
      padding: 0.5em 10px;
      quotes: "\201C""\201D""\2018""\2019";
    }
    .storyquote:before {
      color: #f3256a;
      content: open-quote;
      font-size: 4em;
      line-height: 0.1em;
      margin-right: 0.25em;
      vertical-align: -0.4em;
    }
    .storyquote p {
      display: inline;
    }
  </style>
@endsection

@section('content')
  <section class="mx-4">
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-md-9">
          @if ($story->path() !== "/storage/")
          <p class="text-center"><img class="img-fluid" src="{{ config('app.url') . $story->path() }}" alt="{{ $story->title }}"></p>
          @endif

          <div class="mt-4">
            <div>
              <h3 class="section-title">{{ $story->title }} - <span class="text-primary" style="text-transform: initial">{{ $story->category->name }}</span></h3>
            </div>
            {!! $socialshare !!}
            <div class="my-5">
              <blockquote class="storyquote mt-2"><p>{{ $story->excerpt }}</p></blockquote>
              <div>{!! $story->article !!}</div>
              <div class="d-flex justify-content-center mt-5">
                @foreach ($story->tags as $tag)
                  <span class="tagging float-right mx-2" style="background-color:{{ $tag->color }}; color:#fff;">{{ $tag->name }}</span>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="my-3">
        <h4 class="section-title text-center">Recent Stories</h4>
        <div class="row d-flex justify-content-center">
          @foreach ($stories as $item)
            <div class="col-md-4">
              <div class="card blog-card my-2" property="itemListElement" typeof="ListItem">
                <meta property="position" content="{{ $item->id }}">
                <div class="card-body">
                  <h4 property="name" class="card-title text-center">{{ $item->title}}</h4>
                  <div class="my-3">
                    @foreach ($item->tags as $tag)
                      <span class="tagging mx-2" style="background-color:{{ $tag->color }}; color:#fff;">{{ $tag->name }}</span>
                    @endforeach
                  </div>
                  <div>
                    <div property="description" class="card-text my-3">{{ $item->excerpt }}</div>
                    <a property="item" typeof="WebPage" href="{{ route('stories.show', $item) }}" class="button float-right">Read More</a>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>
@endsection

@section('js')
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="{{ asset('assets/js/plugins/share.js') }}"></script>
@endsection