<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
  <div class="scrollbar-inner scroll-scrollx_visible">
    <div class="sidenav-header d-flex align-items-center">
      <a class="navbar-brand" href="{{ route('index') }}">
        <img src="{{ asset('assets/images/web/brand/logo_text.png') }}" class="navbar-brand-img" alt="{{ config('app.nick') }}">
      </a>
      <div class="ml-auto">
        <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-pin" data-target="#sidenav-main">
          <div class="sidenav-toggler-inner">
            <i class="sidenav-toggler-line"></i>
            <i class="sidenav-toggler-line"></i>
            <i class="sidenav-toggler-line"></i>
          </div>
        </div>
      </div>
    </div>
   <div class="navbar-inner">
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <ul class="navbar-nav">
          <li class="nav-item {{ $elementName == 'dashboard' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('communication.dashboard') }}">
              <i class="ni ni-shop text-primary"></i>
              <span class="nav-link-text">{{ __('Dashboard') }}</span>
            </a>
          </li>
          <li class="nav-item {{ $elementName == 'track' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('communication.track.index') }}">
              <i class="ni ni-books text-red"></i>
              <span class="nav-link-text">{{ __('Courses') }}</span>
            </a>
          </li>
           <li class="nav-item {{ $elementName == 'project' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('communication.project.index') }}">
              <i class="ni ni-world-2 text-red"></i>
              <span class="nav-link-text">{{ __('Student Projects') }}</span>
            </a>
          </li>
          <li class="nav-item {{ $parentSection == 'helper' ? 'active' : '' }}">
            <a class="nav-link" href="#navbar-helper" data-toggle="collapse" role="button" aria-expanded="{{ $parentSection == 'helper' ? 'true' : '' }}" aria-controls="navbar-helper">
              <i class="fa fa-cog text-info"></i>
              <span class="nav-link-text">{{ __('Helper') }}</span>
            </a>
            <div class="collapse {{ $parentSection == 'helper' ? 'show' : '' }}" id="navbar-helper">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item {{ $elementName == 'tag' ? 'active' : '' }}">
                  <a href="{{ route('communication.tag.index') }}" class="nav-link">{{ __('Tag') }}</a>
                </li>
                <li class="nav-item {{ $elementName == 'category' ? 'active' : '' }}">
                  <a href="{{ route('communication.category.index') }}" class="nav-link">{{ __('Category') }}</a>
                </li>
                <li class="nav-item {{ $elementName == 'venue' ? 'active' : '' }}">
                  <a href="{{ route('communication.venue.index') }}" class="nav-link">{{ __('Venue') }}</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item {{ $parentSection == 'site' ? 'active' : '' }}">
            <a class="nav-link" href="#navbar-site" data-toggle="collapse" role="button" aria-expanded="{{ $parentSection == 'site' ? 'true' : '' }}" aria-controls="navbar-site">
              <i class="ni ni-single-copy-04 text-success"></i>
              <span class="nav-link-text">{{ __('Site Management') }}</span>
            </a>
            <div class="collapse {{ $parentSection == 'site' ? 'show' : '' }}" id="navbar-site">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item {{ $elementName == 'workshop' ? 'active' : '' }}">
                  <a href="{{ route('communication.workshop.index') }}" class="nav-link">{{ __('Events') }}</a>
                </li>
                <li class="nav-item {{ $elementName == 'story' ? 'active' : '' }}">
                  <a href="{{ route('communication.story.index') }}" class="nav-link">{{ __('Stories') }}</a>
                </li>
              </ul>
            </div>
          </li>
 <li class="nav-item {{ $elementName == 'profile' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('communication.profile.edit') }}">
              <i class="ni ni-single-02 text-red"></i>
              <span class="nav-link-text">{{ __('Profile') }}</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
