@extends('web.layouts.app')

@section('pageTitle','CopaTechClub - Projects')
@section('pageDescription', 'Showcasing CopaTechClub æpps')

@section('content')
  <section class="mx-4">
    <header class="section-header text-center">
      <h2 class="section-title" style="text-transform: lowercase">Club æpps</h2>
      <p class="header-subtitle">æpps from {{ config('app.name') }} community</p>
    </header>
    <div class="container">
      @if ($aekitis->count() === 0 & $jaemers->count() === 0 & $others->count() === 0)
        <div class="col-12">
          <p class="text-center">Anticipate amazing projects</p>
        </div>
      @elseif ($aekitis->count() > 0)
        <section class="my-2">
          <div class="section-header text-center">
            <h3 class="section-title" style="text-transform: lowercase">Club Developed applications</h3>
          </div>
          <div class="row d-flex justify-content-center">
            @foreach ($aekitis as $aekiti)
              <div class="col-md-4 col-12">
                <div class="card project-card" >
                  <div class="cardheader">
                    @if ($aekiti->path() !== "/storage/")
                      <div class="img-top" >
                        <img src="{{ config('app.url') . $aekiti->path() }}" alt="{{ $aekiti->name }}">
                      </div>
                    @endif
                    <h5 class="card-title">{{ $aekiti->name }}</h5>
                  </div>
                  <div class="card-body">
                    <div class="project-tag">
                      @foreach ($aekiti->tags as $tag)
                        <p class="tagging" style="background-color:{{ $tag->color }}; color:#fff;">{{ $tag->name }}</p>
                      @endforeach
                    </div>
                    <div>
                      <p><b>Developed On</b>: {{ Carbon\Carbon::parse($aekiti->date)->format('l, jS F, Y') }}</p>
                      <p class="card-text">{{ $aekiti->description }}</p>
                    </div>
                    <div class="float-right">
                      @if ($aekiti->youtube !== null)
                        <a href="{{ $aekiti->youtube }}" class="btn btn-flat"><i class="fab fa-youtube"></i></a>
                      @endif
                      @if ($aekiti->github !== null)
                        <a href="{{ $aekiti->github }}" class="btn btn-flat"><i class="fab fa-github"></i></a>
                      @endif
                      <a href="{{ $aekiti->link }}" class="btn btn-primary">View project</a>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </section>
      @endif
      @if ($jaemers->count() > 0)
        <section class="my-2">
          <div class="section-header text-center">
            <h3 class="section-title" style="text-transform: lowercase">jæmers</h3>
          </div>
          <div class="row d-flex justify-content-center">
            @foreach ($jaemers as $jaemer)
              <div class="col-md-4 col-12">
                <div class="card project-card" >
                  <div class="cardheader">
                    @if ($jaemer->path() !== "/storage/")
                      <div class="img-top" >
                        <img src="{{ config('app.url') . $jaemer->path() }}" alt="{{ $jaemer->name }}">
                      </div>
                    @endif
                    <h5 class="card-title">{{ $jaemer->name }}</h5>
                  </div>
                  <div class="card-body">
                    <div class="project-tag">
                      @foreach ($jaemer->tags as $tag)
                        <p class="tagging" style="background-color:{{ $tag->color }}; color:#fff;">{{ $tag->name }}</p>
                      @endforeach
                    </div>
                    <div>
                      <p><b>Developed On</b>: {{ Carbon\Carbon::parse($jaemer->date)->format('l, jS F, Y') }}</p>
                      <p class="card-text">{{ $jaemer->description }}</p>
                    </div>
                    <div class="float-right">
                      @if ($jaemer->youtube !== null)
                        <a href="{{ $jaemer->youtube }}" class="btn btn-flat"><i class="fab fa-youtube"></i></a>
                      @endif
                      @if ($jaemer->github !== null)
                        <a href="{{ $jaemer->github }}" class="btn btn-flat"><i class="fab fa-github"></i></a>
                      @endif
                      <a href="{{ $jaemer->link }}" class="btn btn-primary">View project</a>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </section>
      @endif
      @if ($others->count() > 0)
        <section class="my-2">
          <div class="section-header text-center">
            <h3 class="section-title" style="text-transform: lowercase">others</h3>
          </div>
          <div class="row d-flex justify-content-center">
            @foreach ($others as $other)
              <div class="col-md-4 col-12">
                <div class="card project-card" >
                  <div class="cardheader">
                    @if ($other->path() !== "/storage/")
                      <div class="img-top" >
                        <img src="{{ config('app.url') . $other->path() }}" alt="{{ $other->name }}">
                      </div>
                    @endif
                    <h5 class="card-title">{{ $other->name }}</h5>
                  </div>
                  <div class="card-body">
                    <div class="project-tag">
                      @foreach ($other->tags as $tag)
                        <p class="tagging" style="background-color:{{ $tag->color }}; color:#fff;">{{ $tag->name }}</p>
                      @endforeach
                    </div>
                    <div>
                      <p><b>Developed On</b>: {{ Carbon\Carbon::parse($other->date)->format('l, jS F, Y') }}</p>
                      <p class="card-text">{{ $other->description }}</p>
                    </div>
                    <div class="float-right">
                      @if ($other->youtube !== null)
                        <a href="{{ $other->youtube }}" class="btn btn-flat"><i class="fab fa-youtube"></i></a>
                      @endif
                      @if ($other->github !== null)
                        <a href="{{ $other->github }}" class="btn btn-flat"><i class="fab fa-github"></i></a>
                      @endif
                      <a href="{{ $other->link }}" class="btn btn-primary">View project</a>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </section>
      @endif
    </div>
  </section>
@endsection
