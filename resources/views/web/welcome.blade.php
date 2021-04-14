@extends('web.layouts.app')

@section('css')
  <script src="https://www.googleoptimize.com/optimize.js?id=OPT-NRRT567"></script>
@endsection

@section('content')
  <header id="hero" class="hero">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 col-sm-6">
          <div class="hero-content">
            <div class="hero-title__group">
              <div class="hero-title">
                <h2 class="zuri">{{ config('app.name') }}.</h2>
              </div>
              <div class="Hero--Subtitle">
                <p class="lead">Cuk Developer Student Clubs is a
                  Developers program for university students to learn<span class="text-primary"> <b>mobile </b></span> , <span class="text-primary"><b>web development skills</b></span> and <span class="text-primary"><b>design thinking skills</b></span> 
                </p>
              </div>
            </div>
            <div style="width:auto;background-color: #FFF;padding: 3px;border: 2px solid #e67e22;border-radius: 4px">
              <script async src="https://cse.google.com/cse.js?cx=b65a8f1af05793704"></script>
              <style>
                .gsc-control-cse
                {
                  padding:0px !important;
                  border-width:0px !important;
                }
                form.gsc-search-box,table.gsc-search-box
                {
                  margin-bottom:0px !important;
                }
                .gsc-search-box .gsc-input
                {
                  padding:0px 4px 0px 6px !important;
                }
                #gsc-iw-id1
                {
                  height: auto !important;
                  padding: 0px !important;
                  border-width: 0px !important;
                  box-shadow:none !important;
                }
                #gs_tti50
                {
                  padding:0px !important;
                }
                #gsc-i-id1
                {
                  height:33px !important;
                  padding:0px !important;
                  background:none !important;
                  text-indent:0px !important;
                }
                .gsib_b
                {
                  display:none;
                }
                button.gsc-search-button
                {
                  display:block;
                  width:13px !important;
                  height:13px !important;
                  border-width:0px !important;
                  margin:0px !important;
                  padding: 10px 6px 10px 13px !important;
                  outline:none;
                  cursor:pointer;
                  box-shadow:none !important;
                  box-sizing: content-box !important;
                }
                .gsc-branding
                {
                  display:none !important;
                }
                .gsc-control-cse,#gsc-iw-id1
                {
                  background-color:transparent !important;
                }

                #gsc-i-id1
                {
                  color:#1B2733;
                }

                button.gsc-search-button
                {
                  padding:10px !important;
                  background-color: #e67e22 !important;
                  border-radius: 3px !important;
                }
                .gsc-search-button-v2 svg {
                  fill: #2d1e4f;
                }
              </style>
              <div class="gcse-search"></div>
              <script>
                window.onload = function() {
                  var searchBox =  document.getElementById("gsc-i-id1");
                  searchBox.placeholder="Search the web for Copa Tech Club or Co-operative";
                  searchBox.title="Search the web for Copa Tech Club or Co-operative";
                }
              </script>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-5 ml-auto">
          <div class="hero-figure">
            <img src="{{ asset('assets/images/web/diversity.png') }}" class="img-fluid w-100" alt="Illustration of the æmbassies">
          </div>
        </div>
      </div>
    </div>
  </header>

  <section id="overview" class="section-spacer">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-12">
          <div class="feature-card">
            <div class="feature-card__body">
              <i class="fa fa-rocket ghost-blue"></i>
              <h4 class="feature-title">Concept of Developer Student Club</h4>
              <p>The DSC program is a grassroots channel that provides development skills, mobile and web development skills for students, towards employability.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-12">
          <div class="feature-card">
            <div class="feature-card__body">
              <i class="fa fa-lightbulb ghost-green"></i>
              <h4 class="feature-title">Why Developer Student Club?</h4>
              <p>For students to learn development skills, solve problems through technology and inspire them to be world class developers and changemakers.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-12">
          <div class="feature-card m-0">
            <div class="feature-card__body">
              <i class="fa fa-users ghost-red"></i>
              <h4 class="feature-title">Target audience</h4>
              <p>Developer Student Club activities are targeted at University students and any others including faculty members who want to learn development skills  &amp; work to solve real-life problems.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="opportunities" class="section-spacer section-opp">
    <div class="container">
      <header class="section-header text-center">
        <h2 class="section-title-custom">Opportunities the club provide students with</h2>
      </header>
      <div class="row">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <ul>
                <li> ◾&nbsp; Grow their knowledge on developer technologies and more through peer to peer workshops and events.</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <ul>
                <li> ◾&nbsp; Gain relevant industry experience by solving problems for local organizations with technology based solutions.</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <ul>
                <li> ◾&nbsp;Showcase their prototypes and solutions to their local community and industry leaders.</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <ul>
                <li> ◾&nbsp; Getting inspiration to become world-class developers and changemakers from sharing others' success stories.</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="technologies" class="section-spacer bg-very__gray">
    <div class="container">
      <header class="section-header text-center">
        <h2 class="section-title">Technologies we're excited about</h2>
        <p class="section-subtitle">Opportunities to learn & access deep technical content.</p>
        <br>
      </header>
      <div class="row align-items-center">
        <div class="col-sm-6">
          <div class="feature-list-image">
            <img src="{{ asset('assets/images/web/technologies/android.png') }}" class="img-fluid" alt="Android Development">
          </div>
        </div>
        <div class="col-sm-5 ml-auto">
          <div class="feature-list-wrapper">
            <div class="content-header">
              <h2 class="content-title">Android Development</h2>
              <p>Every year Google developers release exciting new updates to the world's most popular operating system. We always have sessions to keep you updated and mastering the latest trends in modern Android development.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section-spacer">
    <div class="container">
      <div class="row flex-column-reverse flex-sm-row align-items-center">
        <div class="col-sm-5 mr-auto">
          <div class="feature-list-wrapper">
            <div class="content-header">
              <h2 class="content-title">Web Development</h2>
              <p>Learn the core foundations of a delightful web experience both for the user and developer. Stay up to tabs with emerging and trending technologies. Get access to a guided, tutorial and hands-on coding experience.</p>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="feature-list-image">
            <img src="{{ asset('assets/images/web/technologies/web.png') }}" alt="Web Development" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="hip" class="section-spacer bg-very__gray">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-sm-6">
          <div class="feature-list-image">
            <img src="{{ asset('assets/images/web/technologies/cloud.png') }}" class="img-fluid" alt="Cloud Computing">
          </div>
        </div>
        <div class="col-sm-5 ml-auto">
          <div class="feature-list-wrapper">
            <div class="content-header">
              <h2 class="content-title">Cloud Computing</h2>
              <p>For passionate developers who want to stay relevant in a cloud first world where businesses demand for agility and innovation and prompt rise of cloud-native applications to ridges gaps between data, insight, and action.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section-spacer">
    <div class="container">
      <div class="row flex-column-reverse flex-sm-row align-items-center">
        <div class="col-sm-5 mr-auto">
          <div class="feature-list-wrapper">
            <div class="content-header">
              <h2 class="content-title">Machine Intelligence</h2>
              <p>Learn how to drive user engagement and retention with intelligent apps that are able to effectively serve users what they need without the fuss by providing these systems with the ability to utomatically learn and improve from experience without being explicitly programmed.</p>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="feature-list-image">
            <img src="{{ asset('assets/images/web/technologies/mi.png') }}" class="img-fluid" alt="Machine Intelligence">
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="workshops" class="section-spacer workshops-section bg-very__gray">
    <div class="container">
      <header class="section-header text-center">
        <h2 class="section-title">Events & Workshops</h2>
        <p class="section-subtitle">Come learn, share and connect with us in person.</p>
      </header>
      <div class="workshops-type-switch">
        <ul class="nav nav-pills justify-content-center js-tabs">
          <li class="nav-item">
            <a class="nav-link active" href="#upcoming">Upcoming Events</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#past">Past Events</a>
          </li>
        </ul>
      </div>
      <div class="tab-content">
        <div class="tab-pane active" id="upcoming" role="tabpanel" aria-labelledby="upcoming">
          <div class="row d-flex justify-content-center" vocab="https://schema.org/" typeof="BreadcrumbList">
            @forelse ($upcomings as $workshop)
              <div class="col-md-4 col-12" property="itemListElement" typeof="ListItem">
                <div class="card event-card">
                  <div class="card-body">
                    @foreach ($workshop->tags as $tag)
                      <p class="tagging float-right" style="background-color:{{ $tag->color }}; color:#fff;">{{ $tag->name }}</p>
                    @endforeach
                    <h5 property="name" class="card-title">{{ $workshop->title }}</h5>
                    <table>
                      <tr>
                        <td width="15%" class="text-blue"><i class="far fa-calendar-alt"></i></td>
                        <td>
                          @if ($workshop->mode === 'online_multiple' || $workshop->mode === 'offline_multiple')
                            {{ Carbon\Carbon::parse($workshop->start_date)->format('jS M') }} - {{ Carbon\Carbon::parse($workshop->end_date)->format('jS M, Y') }}
                          @else
                            {{ Carbon\Carbon::parse($workshop->start_date)->format('jS F, Y') }}
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td class="text-red"><i class="fa fa-map-marker-alt"></i></td>
                        <td>{{ $workshop->venue->name }}</td>
                      </tr>
                      <tr>
                        <td class="text-green"><i class="far fa-clock"></i></td>
                        <td>
                          @if ($workshop->mode === 'online_multiple' || $workshop->mode === 'offline_multiple')
                            {{ Carbon\Carbon::parse($workshop->start_date)->format('h:iA') }} - {{ Carbon\Carbon::parse($workshop->end_date)->format('h:iA') }} (WAT)
                          @else
                            {{ Carbon\Carbon::parse($workshop->start_date)->format('h:iA') }} - {{ Carbon\Carbon::parse($workshop->end_date)->format('h:iA') }} (WAT)
                          @endif
                        </td>
                      </tr>
                    </table>
                    <div>
                      @if ($workshop->status === 'postponed')
                        <p class="badge badge-primary">Postponed</p>
                      @endif
                      <a property="item" typeof="WebPage" href="{{ route('workshop.show', $workshop) }}" class="button float-right">Learn More</a>
                    </div>
                    <meta property="description" content="{{ $workshop->excerpt  }}">
                    <meta property="position" content="{{ $workshop->id }}">
                  </div>
                </div>
              </div>
            @empty
              <div class="message-wrapper col-12">
                <h2 class="message-text">No Workshop/Event Yet</h2>
              </div>
            @endforelse
          </div>
        </div>
        <div class="tab-pane" id="past" role="tabpanel" aria-labelledby="past">
          @forelse ($pasts as $item)
            <section class="my-5 {{ $loop->even ? 'bg-very__gray' : '' }}">
              <div class="container">
                <div class="row {{ $loop->even ? 'align-items-center' : 'flex-column-reverse flex-sm-row align-items-center' }}">
                  @if ($loop->even)
                    <div class="col-sm-6">
                      <div class="feature-list-image">
                        @if ($item->youtube === null)
                          <iframe data-urllink="{{  $item->slide }}" frameborder="0" width="480" height="299" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
                        @else
                          <iframe width="500" height="274" data-urllink="{{ $item->youtube }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        @endif
                      </div>
                    </div>
                  @endif
                  <div class="col-sm-5 {{ $loop->even ? 'ml-auto' : 'mr-auto' }}">
                    <div class="feature-list-wrapper">
                      <div class="content-header">
                        <h2 class="content-title"><a href="{{ route('workshop.show', $item) }}">{{ $item->title }}</a></h2>
                        <hr>
                        <h6>
                          DATE :
                          @if ($item->mode === 'online_multiple' || $item->mode === 'offline_multiple')
                            {{ Carbon\Carbon::parse($item->start_date)->format('jS M') }} - {{ Carbon\Carbon::parse($item->end_date)->format('jS M, Y') }}
                          @else
                            {{ Carbon\Carbon::parse($item->start_date)->format('jS F, Y') }}
                          @endif</h6>
                        <h6>VENUE : {{ $item->venue->name }}</h6>
                        <p>{{ $item->excerpt }}</p>
                      </div>
                      @if ($item->photo != null)
                        <a href="{{ $item->photo }}" class="past-event" target="_blank" rel="noopener">EVENT PHOTOS <i class="fa fa-camera"></i></a>
                      @elseif($item->photo === null && $item->slide != null)
                        <a href="{{  $item->slide }}" class="past-event" target="_blank" rel="noopener">EVENT SLIDE <i class="fab fa-slideshare"></i></a>
                      @else
                        <a href="{{ route('workshop.show', $item) }}" class="past-event">SEE MORE <i class="fa fa-link"></i></a>
                      @endif
                    </div>
                  </div>
                  @if ($loop->odd)
                    <div class="col-sm-6">
                      <div class="feature-list-image">
                        @if ($item->youtube === null)
                          <iframe data-urllink="{{  $item->slide }}" frameborder="0" width="480" height="299" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
                        @else
                          <iframe width="500" height="274" data-urllink="{{ $item->youtube }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        @endif
                      </div>
                    </div>
                  @endif
                </div>
              </div>
            </section>
          @empty
            <div class="message-wrapper col-12">
              <h2 class="message-text">No Workshop/Event Yet</h2>
            </div>
          @endforelse
        </div>
      </div>
    </div>
  </section>

  <section id="stories" class="section-spacer stories-section">
    <div class="container">
      <header class="section-header text-center">
        <h2 class="section-title">Stories</h2>
        <p class="section-subtitle">Read our amazing stories to learn more about us.</p>
      </header>
      <div class="row d-flex justify-content-center" vocab="https://schema.org/" typeof="BreadcrumbList">
        @forelse ($stories as $story)
          <div class="col-md-4 col-12" property="itemListElement" typeof="ListItem">
            <div class="card blog-card">
              <div class="card-body">
                <p class="tagging badge-secondary float-right">{{ $story->category->name }}</p>
                <h5 property="name" class="card-title">{{ $story->title }}</h5>
                <p property="description" class="card-text">{{ $story->excerpt }}</p>
                <a property="item" typeof="WebPage" href="{{ route('stories.show', $story) }}" class="button float-right">Read More</a>
                <meta property="position" content="{{ $story->id }}">
              </div>
            </div>
          </div>
        @empty
          <div class="message-wrapper col-12">
            <h2 class="message-text">No Story Yet</h2>
          </div>
        @endforelse
      </div>
    </div>
  </section>

  <section id="team" class="section-spacer team-section bg-very__gray">
    <div  class="container">
      <header class="text-center section-header">
        <h2 class="section-title" style="text-transform: lowercase">Copa Tech Team</h2>
        <p class="section-subtitle">Passionate staff driving the success of the program.</p>
      </header>
      <div class="container-fluid">
        <div id="carouselExample" class="carouselPrograms carousel slide" data-ride="carousel" data-interval="false">
          <div class="carousel-inner d-flex justify-content-center row w-100 mx-auto" role="listbox">
            @foreach ($teams as $team)
              <div class="carousel-item col-md-4 col-15 {{ $team->id === 1 ? 'active' : '' }}">
                <div class="card event-card">
                  <div class="card hovercard">
                    <div class="cardheader"></div>
                    <div class="avatar">
                      <img src="{{ config('app.url') . $team->user->profilePicture() }}" alt="{{ $team->user->name }}">
                    </div>
                    <div class="info">
                      <div class="title">
                        <h5>{{ $team->user->name }}</h5>
                        <p>{{ $team->title }}</p>
                      </div>
                      <div class="desc text-center px-4">{{ $team->description }}</div>
                    </div>
                    <div class="bottom">
                      <ul class="social-list__inline mt-10">
                        <li>
                          <a href="{{ $team->twitter }}" target="_blank" rel="noopener">
                            <i class="fab fa-twitter"></i>
                          </a>
                        </li>
                        @if ($team->github !== null)
                          <li>
                            <a href="{{ $team->github }}" target="_blank" rel="noopener">
                              <i class="fab fa-github"></i>
                            </a>
                          </li>
                        @endif
                        @if ($team->telegram !== null)
                          <li>
                            <a href="{{ $team->telegram }}" target="_blank" rel="noopener">
                              <i class="fab fa-telegram"></i>
                            </a>
                          </li>
                        @endif
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
          <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev" style="cursor:default;">
            <span class="carousel-control-prev-i fa fa-angle-left" aria-hidden="true" style="cursor:pointer;"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next text-faded" href="#carouselExample" role="button" data-slide="next" style="cursor:default;">
            <span class="carousel-control-next-i fa fa-angle-right" aria-hidden="true" style="cursor:pointer;"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </section>

  <section itemscope itemtype="https://schema.org/FAQPage" id="faqs" class="section-spacer section-faq">
    <div class="container">
      <header class="section-header text-center">
        <h2 class="section-title">Frequently Asked Questions</h2>
      </header>
      <div class="row">
        <div class="col-sm-6">
          <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" class="card">
            <div class="card-body">
              <h5 itemprop="name" class="card-title">Who can become a member?</h5>
              <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                <p itemprop="text">The community is open to any writer, digital designer, entrepreneurs, and developer who want to further their skills.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" class="card">
            <div class="card-body">
              <h5 itemprop="name" class="card-title">How frequently do events and workshops occur?</h5>
              <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                <p itemprop="text">We hold workshops and showcases at TechHub EKSU & we would recommend you to join our community by becoming a <a href="{{ route('register') }}">member</a> to get updates.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" class="card">
            <div class="card-body">
              <h5 itemprop="name" class="card-title">What should I carry when attending a workshop?</h5>
              <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                <p itemprop="text">We recommend you carry with you a notebook, pen and a laptop because more often than not we make our hands dirty with code. Most importantly, carry along a healthy dose of curiosity and enthusiasm.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" class="card">
            <div class="card-body">
              <h5 itemprop="name" class="card-title">Who should I reach out to if I have any questions?</h5>
              <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                <p itemprop="text">If you have any questions or comments, please don't hesitate to contact us by clicking the button below. We would be happy to stay engaged via <a href="mailto:contact@copatechclub.com" target="_blank">email</a> even after the event</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="mt-40 text-center">
        <a href="mailto:contact@copatechclub.com" target="_blank" class="hero-button">Send us an email</a>
      </div>
    </div>
  </section>
@endsection
