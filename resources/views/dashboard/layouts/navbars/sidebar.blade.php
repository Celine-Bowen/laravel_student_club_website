@if (auth()->user()->isLead())
  @include('dashboard.lead.layouts.nav.sidebar')
@elseif(auth()->user()->isMedia())
  @include('dashboard.media.layouts.nav.sidebar')
  @elseif(auth()->user()->isCommunication())
  @include('dashboard.communication.layouts.nav.sidebar')
@else
  @include('dashboard.member.layouts.nav.sidebar')
@endif