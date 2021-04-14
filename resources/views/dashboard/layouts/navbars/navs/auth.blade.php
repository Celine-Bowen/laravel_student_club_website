@if (auth()->user()->isLead())
  @include('dashboard.lead.layouts.nav.navbar')
@elseif(auth()->user()->isMedia())
  @include('dashboard.media.layouts.nav.navbar')
  @elseif(auth()->user()->isCommunication())
  @include('dashboard.communication.layouts.nav.navbar')
@else
  @include('dashboard.member.layouts.nav.navbar')
@endif