@extends('web.layouts.app')

@section('pageTitle')
  {{ config('app.nick') }} workshops: {{ $workshop->title }}
@endsection
@section('pageDescription')
  {{ $workshop->excerpt }}
@endsection
@section('pageImage')
  {{ $workshop->path() !== '/storage/' ? config('app.url') . $workshop->path() :  config('app.url').'/assets/images/icons/icon-512x512.png' }}
@endsection

@section('css')
<script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Event",
    "name": "{{ $workshop->title }}",
    "mainEntityOfPage": {
      "@type": "WebPage",
      "@id": "{{ url()->current() }}"
    },
    "startDate": "{{ Carbon\Carbon::parse($workshop->start_date)->format('c') }}",
    "endDate": "{{ Carbon\Carbon::parse($workshop->end_date)->format('c') }}",
    "identifier": "@foreach ($workshop->tags as $tag){{ $tag->name }}, @endforeach",
    "sameAs": "{{ url()->current() }}",
    "image": "{{ $workshop->path() !== '/storage/' ? config('app.url') . $workshop->path() :  config('app.url').'/assets/images/icons/icon-512x512.png' }}",
    "description": "{{ $workshop->excerpt }}",
    "eventAttendanceMode": "@foreach (config('aekiti.workshops.mode') as $value => $mode) {{ $workshop->mode === $value ? $mode : '' }} @endforeach",
    "eventStatus": "@foreach (config('aekiti.workshops.status') as $value => $status){{ $workshop->status === $value ? $status : '' }} @endforeach",
    "location": {
      "@type": "Place",
      "name": "{{ $workshop->venue->name }}",
      "sameAs": "{{ $workshop->venue->link }}",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "{{ $workshop->venue->address }}",
        "addressLocality": "{{ $workshop->venue->locality }}",
        "postalCode": "{{ $workshop->venue->postal }}",
        "addressRegion": "{{ $workshop->venue->region }}",
        "addressCountry": "{{ $workshop->venue->country }}"
      }
    },
    "offers": {
      "@type": "Offer",
      "url": "{{ url()->current() }}",
      "price": "0",
      "priceCurrency": "USD",
      "availability": "https://schema.org/InStock",
      "validFrom": "{{ $workshop->created_at }}"
    },
    "performer": {
      "@type": "PerformingGroup",
      "name": "{{ config('app.nick') }} team"
    },
    "organizer": {
      "@type": "Organization",
      "name": "{{ config('app.name') }}({{ config('app.nick') }})",
      "url": "{{ config('app.url') }}"
    }
  }
  </script>
@endsection

@section('content')
  <section class="mx-4">
    <div class="container">
      <div class="row">
        <div class="col-md-8 order-md-1">
          @if ($workshop->path() !== "/storage/")
            <div class="text-center">
              <img class="img-fluid" src="{{ config('app.url') . $workshop->path() }}" alt="{{ $workshop->title }}">
            </div>
          @endif
          <div class="mt-4">
            <div>
              <h3 class="section-title text-wrap">
                {{ $workshop->title }}
                @foreach ($workshop->tags as $tag)
                  <span class="tagging float-right" style="background-color:{{ $tag->color }}; color:#fff;">{{ $tag->name }}</span>
                @endforeach
              </h3>
              <br>
              <div class="my-2">
                <ul class="nav nav-tabs nav-justified">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#description">Description</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#resources">Resources</a>
                  </li>
                  <li class="nav-item">
                    @if ($workshop->link !== null && ($workshop->status === 'ongoing' || $workshop->status === 'postponed'))
                      <a class="nav-link" href="{{ $workshop->link }}" target="_blank">Register</a>
                    @elseif($workshop->link !== null && $workshop->status === 'past')
                      <a class="nav-link text-muted" style="cursor: not-allowed" href="#">Registration closed!</a>
                    @elseif($workshop->link === null)
                      <a class="nav-link text-muted" style="cursor: not-allowed" href="#">Registration unavailable!</a>
                    @endif
                  </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content mt-4">
                  <div class="tab-pane container active" id="description">
                    {!! $socialshare !!}
                    <div class="my-4">{!! $workshop->description !!}</div>
                  </div>
                  <div class="tab-pane container text-center fade" id="resources">
                    @if ($workshop->youtube === null & $workshop->slide === null)
                      <p>No Extra Resources</p>
                    @elseif ($workshop->youtube !== null)
                      <h3><a href="{{ $workshop->youtube }}" target="_blank" rel="noopener">YouTube</a></h3>
                      <div class="my-2">
                        <iframe width="500" height="274" data-urllink="{{ $workshop->youtube }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                      </div>
                    @endif
                    @if ($workshop->slide !== null)
                      <h3><a href="{{ $workshop->slide }}" target="_blank" rel="noopener">Slide</a></h3>
                      <div class="my-4">
                        <iframe data-urllink="{{  $workshop->slide }}" frameborder="0" width="480" height="299" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
                      </div>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 order-md-2">
          <div class="card mb-4">
            <div class="card-body">
              <div class="card-text mb-4">
                @foreach (config('aekiti.workshops.status') as $value => $status)
                  @if ($workshop->status === $value)
                    <p class="text-center h4 bold" style="text-transform: capitalize">{{ $value }} Event</p>
                  @endif
                @endforeach
              </div>
              <div class="d-flex card-text my-4">
                <div class="mr-3"><i class="far fa-2x fa-calendar-alt text-success"></i></div>
                <div>
                  @if ($workshop->mode === 'online_multiple' || $workshop->mode === 'offline_multiple')
                    {{ Carbon\Carbon::parse($workshop->start_date)->format('jS M') }} - {{ Carbon\Carbon::parse($workshop->end_date)->format('jS M, Y') }}
                  @else
                    {{ Carbon\Carbon::parse($workshop->start_date)->format('l, jS F, Y') }}
                  @endif
                  <br>
                  @if ($workshop->mode === 'online_multiple' || $workshop->mode === 'offline_multiple')
                    {{ Carbon\Carbon::parse($workshop->start_date)->format('h:iA') }} - {{ Carbon\Carbon::parse($workshop->end_date)->format('h:iA') }} (WAT)
                  @else
                    {{ Carbon\Carbon::parse($workshop->start_date)->format('h:iA') }} - {{ Carbon\Carbon::parse($workshop->end_date)->format('h:iA') }} (WAT)
                  @endif
                  @if ($workshop->status !== 'past')
                    <div class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="#">Add to Calender</a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ $calendar->google() }}" target="blank">Google</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ $calendar->ics() }}" target="blank">iCal</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ $calendar->yahoo() }}" target="blank">Yahoo</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ $calendar->webOutlook() }}" target="blank">Outlook</a>
                      </div>
                    </div>
                  @endif
                </div>
              </div>
              <div class="d-flex card-text">
                <div class="mr-3"><i class="fa fa-2x fa-map-marker-alt text-danger"></i></div>
                <div>
                  <p>
                    <strong><a href="{{ $workshop->venue->link }}" target="_blank">{{ $workshop->venue->name }}</a></strong><br>
                    {{ $workshop->venue->address }}<br>
                    {{ $workshop->venue->locality }}<br>
                    {{ $workshop->venue->postal }}
                  </p>
                </div>
              </div>
              <iframe src="{{ $workshop->venue->map }}" width="100%" frameborder="0" style="border:0;" allowfullscreen="true" aria-hidden="false"></iframe>
            </div>
          </div>
          @if ($workshop->id !== $latest->id)
            <div class="my-4">
              <h4 class="section-title text-center">Latest Event</h4>
              <div class="card my-2">
                <div class="card-body">
                  <h4 class="card-title text-center mb-3">{{ $latest->title }}</h4>
                  <div>
                    @foreach ($latest->tags as $tag)
                      <div class="tagging float-right" style="background-color:{{ $tag->color }}; color:#fff;">{{ $tag->name }}</div>
                    @endforeach
                    <div class="card-text my-3">{{ $latest->excerpt }}</div>
                    <a href="{{ route('workshop.show', $latest) }}" class="button float-right">See Event</a>
                  </div>
                </div>
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>
  </section>
@endsection

@section('js')
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="{{ asset('assets/js/plugins/share.js') }}"></script>
@endsection
