@extends('web.layouts.app')

@section('pageTitle','CopaTechClub - Stories')
@section('pageDescription', 'Read our amazing stories')

@section('content')
  <section class="mx-4">
    <header class="section-header text-center">
      <h2 class="section-title" style="text-transform: lowercase">{{ config('app.nick') }} stories</h2>
    </header>
    <div class="container">
      <div vocab="https://schema.org/" typeof="BreadcrumbList">
        @forelse ($stories as $story)
          <div class="card blog-card col-12" property="itemListElement" typeof="ListItem">
            <div class="card-body">
              @foreach ($story->tags as $tag)
                <span class="tagging float-right mx-2" style="background-color:{{ $tag->color }}; color:#fff;">{{ $tag->name }}</span>
              @endforeach
              <h5 property="name" class="card-title"><a href="{{ route('stories.show', $story) }}">{{ $story->title }}</a></h5>
              <p property="description" class="card-text">{{ $story->excerpt }}</p>
              <meta property="position" content="{{ $story->id }}">
              <a property="item" typeof="WebPage" href="{{ route('stories.show', $story) }}" class="button float-right">Read More</a>
            </div>
          </div>
        @empty
          <p class="text-center">Anticipate amazing stories</p>
        @endforelse
        <div class="d-flex justify-content-center mt-4">
          {{ $stories->links() }}
        </div>
      </div>
    </div>
  </section>
@endsection