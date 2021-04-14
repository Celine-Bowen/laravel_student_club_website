<div class="row align-items-center py-4">
  <div class="col-lg-6 col-7">
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
      <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
        <li class="breadcrumb-item"><a href="{{ route('lead.dashboard') }}"><i class="fas fa-home"></i></a></li>
        {{ $slot }}
      </ol>
    </nav>
  </div>
  @if (isset($calendar))
    {{ $calendar }}
  @endif
</div>