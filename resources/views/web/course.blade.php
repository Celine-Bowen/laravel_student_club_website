@extends('web.layouts.app')

@section('pageTitle','CopaTechClub - Course')
@section('pageDescription', 'Learn more with our free resources')

@section('content')
  <section class="mx-4">
    <header class="section-header text-center">
      <h2 class="section-title">Share experiences and free resources</h2>
    </header>
    <div class="container">
      <div class="row">
        @forelse ($tracks as $track)
          <div class="col-md-4 col-12" vocab="https://schema.org/" typeof="Course">
            <div class="card course-card" style="width: 22rem;">
              @if ($track->path() !== "/storage/")
                <img property="image" class="card-img-top" src="{{ config('app.url') . $track->path() }}" alt="{{ $track->name }}">
              @endif
              <div class="card-body">
                @foreach ($track->tags as $tag)
                  <p class="tagging float-right" style="background-color:{{ $tag->color }}; color:#fff;">{{ $tag->name }}</p>
                @endforeach
                <h5 property="name" class="card-title">
                  {{ $track->name }}<br>
                  <span class="text-muted" style="font-size: 12px"><b>Source</b>: {{ $track->source }}</span>
                </h5>
                <p property="description" class="card-text">{{ $track->description }}</p>
                <a property="url" href="{{ $track->link }}" class="button float-right" target="_blank">View course</a>
                <meta property="provider" content="{{ $track->source }}">
              </div>
            </div>
          </div>
        @empty
          <div class="col-12">
            <p class="text-center">Anticipate amazing tutorials</p>
          </div>
        @endforelse
      </div>
    </div>
  </section>
@endsection
