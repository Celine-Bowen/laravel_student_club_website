@if (auth()->user()->isLead())
@include('dashboard.lead.layouts.breadcrumbs')
@elseif(auth()->user()->isMedia())
@include('dashboard.media.layouts.breadcrumbs')
@elseif(auth()->user()->isCommunication())
@include('dashboard.communication.layouts.breadcrumbs')
@else
@include('dashboard.member.layouts.breadcrumbs')
@endif